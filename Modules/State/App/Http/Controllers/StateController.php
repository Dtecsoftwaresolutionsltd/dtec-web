<?php

namespace Modules\State\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\State\App\Models\State;
use Modules\Country\Entities\Country;
use Modules\Language\App\Models\Language;
use Modules\State\App\Models\StateTranslation;
use Modules\State\App\Http\Requests\StateRequest;
// use Modules\State\App\Http\Controllers\StateController;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $states = State::with('translate', 'country')->get();

        return view('state::index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $countries = Country::latest()->get();

        return view('state::create', [
            'countries' => $countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StateRequest $request)
    {
        $state = new State();
        $state->country_id = $request->country_id;
        $state->save();

        $languages = Language::all();
        foreach($languages as $language){
            $state_translation = new StateTranslation();
            $state_translation->lang_code = $language->lang_code;
            $state_translation->state_id = $state->id;
            $state_translation->name = $request->name;
            $state_translation->save();
        }

        $notification= trans('Created Successfully');
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
        return redirect()->route('admin.state.edit', ['state' => $state->id, 'lang_code' => admin_lang()])->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request ,$id)
    {
        $state = State::findOrFail($id);
        $state_translate = StateTranslation::where(['state_id' => $id, 'lang_code' => $request->lang_code])->first();

        $countries = Country::latest()->get();

        return view('state::edit', compact('state','state_translate', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(StateRequest $request, $id)
    {
        $state = State::findOrFail($id);
        if($request->lang_code == admin_lang()){

            $state->country_id = $request->country_id;
            $state->save();
        }


        $state_translation = StateTranslation::findOrFail($request->translate_id);
        $state_translation->name = $request->name;
        $state_translation->save();

        $notification= trans('Update Successfully');
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $state = State::find($id);

        $state->delete();

        StateTranslation::where('state_id', $id)->delete();

        $notification= trans('Delete Successfully');
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.state.index')->with($notification);
    }


}
