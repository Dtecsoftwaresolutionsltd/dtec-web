<?php

namespace Modules\City\Http\Controllers;

use Image, File, Str;
use Illuminate\Http\Request;
use Modules\City\Entities\City;
use Modules\Town\App\Models\Town;
use Illuminate\Routing\Controller;
use Modules\State\App\Models\State;
use Modules\Country\Entities\Country;

use Modules\Listing\Entities\Listing;

use Modules\Language\App\Models\Language;
use Modules\City\Entities\CityTranslation;
use Modules\City\Http\Requests\CityRequest;
use Illuminate\Contracts\Support\Renderable;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $cities = City::with('translate', 'state')->get();

        return view('city::index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $countries = Country::latest()->get();
        $states = State::latest()->get();

        return view('city::create', [
            'countries' => $countries,
            'states' => $states,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CityRequest $request)
    {
        $city = new City();
        $city->state_id = $request->state_id;
        $city->save();

        $languages = Language::all();
        foreach ($languages as $language) {
            $city_translation = new CityTranslation();
            $city_translation->lang_code = $language->lang_code;
            $city_translation->city_id = $city->id;
            $city_translation->name = $request->name;
            $city_translation->save();
        }

        $notification = trans('Created Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
        return redirect()->route('admin.city.edit', ['city' => $city->id, 'lang_code' => admin_lang()])->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $city_translate = CityTranslation::where(['city_id' => $id, 'lang_code' => $request->lang_code])->first();



        $countries = Country::latest()->get();

        $selected_country_id = 0;
        if ($city->state) {
            $selected_country_id = $city->state->country_id;
        }

        $states = State::where('country_id', $selected_country_id)->latest()->get();

        return view('city::edit', compact('city', 'city_translate', 'states', 'countries', 'selected_country_id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CityRequest $request, $id)
    {
        $city = City::findOrFail($id);
        if ($request->lang_code == admin_lang()) {

            $city->state_id = $request->state_id;
            $city->save();
        }


        $city_translation = CityTranslation::findOrFail($request->translate_id);
        $city_translation->name = $request->name;
        $city_translation->save();

        $notification = trans('Update Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $town_exist = Town::where('city_id', $id)->count();
        if ($town_exist) {
            $notification = trans('This city has related town. So you can not delete this city');
            $notification = array('message' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $city = City::find($id);

        $city->delete();

        CityTranslation::where('city_id', $id)->delete();

        $notification = trans('Delete Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.city.index')->with($notification);
    }

    public function setup_language($lang_code)
    {
        $city_translates = CityTranslation::where('lang_code', admin_lang())->get();
        foreach ($city_translates as $city_translate) {
            $city_translation = new CityTranslation();
            $city_translation->lang_code = $lang_code;
            $city_translation->city_id = $city_translate->city_id;
            $city_translation->name = $city_translate->name;
            $city_translation->save();
        }
    }
}
