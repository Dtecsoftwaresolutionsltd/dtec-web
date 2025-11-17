<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ManageSection;
use App\Http\Controllers\Controller;

class SectionManageController extends Controller
{
    public function index()
    {
        $pageTitle=__('Section Management');
        $pageName=ManageSection::pluck('page_name')->unique()->toArray();
        $order=['home_one','home_two','home_three','home_four','home_five','home_six','home_seven'];
        usort($pageName, function ($a, $b) use ($order) {
            return array_search($a, $order) <=> array_search($b, $order);
        });

        return view('admin.section.index',compact('pageTitle','pageName'));
    }

    public function edit($page){

        $pagesections=ManageSection::where('page_name',$page)->get();

        return view('admin.section.edit',compact('pagesections'));
    }

    public function update(Request $request){

        $ids=$request->id;
        $status=$request->status;
        $position=$request->position;

        foreach($ids as $key => $id){
            $manageSection=ManageSection::findOrFail($id);

            if($manageSection){
                $manageSection->status=$status[$key] ?? 0;
                $manageSection->serial_number=$position[$key];
                $manageSection->save();
            }

        }

        $notify_message = trans('Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.section-manage')->with($notify_message);

    }
}
