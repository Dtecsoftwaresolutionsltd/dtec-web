<?php

namespace Modules\Ecommerce\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ecommerce\Entities\ShippingMethod;

class ShippingMethodController extends Controller
{

    public function index()
    {
        $methods = ShippingMethod::latest()->get();

        return view('ecommerce::admin.shipping-methods.index', compact('methods'));
    }

    public function create()
    {
        return view('ecommerce::admin.shipping-methods.create');
    }

    public function store(Request $request, $id = null): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $method = $id ? ShippingMethod::findOrFail($id) : new ShippingMethod();
        $method->name = $request->name;
        $method->price = $request->price;
        $method->save();

        $notification = trans('' . ($id ? 'Updated Successfully' : 'Created Successfully'));
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.shipping-method.index')->with($notification);
    }

    public function edit($id)
    {
        $method = ShippingMethod::findOrFail($id);

        return view('ecommerce::admin.shipping-methods.create', compact('method'));
    }

    public function delete($id)
    {
        $method = ShippingMethod::findOrFail($id);
        $method->delete();

        $notification=  trans('Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.shipping-method.index')->with($notification);
    }

    public function status($id)
    {
        $method = ShippingMethod::findOrFail($id);
        if($method->status == Status::ENABLE){
            $method->status = Status::DISABLE;
            $method->save();
            $message = trans('Status Changed Successfully');
        }else{
            $method->status = Status::ENABLE;
            $method->save();
            $message = trans('Status Changed Successfully');
        }
        return response()->json($message);
    }

}
