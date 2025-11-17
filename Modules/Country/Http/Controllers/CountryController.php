<?php

namespace Modules\Country\Http\Controllers;

use Illuminate\Http\Request;
use Modules\City\Entities\City;
use Illuminate\Routing\Controller;
use Modules\Country\Entities\Country;
use Modules\Listing\Entities\Listing;
use Illuminate\Contracts\Support\Renderable;
use Modules\Country\Http\Requests\CountryRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $countries = Country::latest()->get();

        return view('country::index', [
            'countries' => $countries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('country::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CountryRequest $request)
    {
        $country = new Country();
        $country->name = $request->name;
        $country->save();

        $notification= trans('Created Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $country = Country::findOrFail($id);

        return view('country::edit', [
            'country' => $country
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $country->name = $request->name;
        $country->save();

        $notification= trans('Updated Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.country.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $country = Country::findOrFail($id);

        $city_exist = City::where('country_id', $id)->count();

        if($city_exist > 0){
            $notification= trans('Multiple city exist under this country, so you can not delete it');
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }

        $country->delete();

        $notification= trans('Deleted Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.country.index')->with($notification);

    }
}
