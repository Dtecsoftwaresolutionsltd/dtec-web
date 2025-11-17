<?php

namespace Modules\Ecommerce\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Ecommerce\Entities\Order;

class OrderController extends Controller
{

    public function index()
    {

        $orders = Order::with('order_detail.singleProduct.translate')->latest()->get();
        return view('ecommerce::admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('ecommerce::admin.orders.view', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {


        $order = Order::findOrFail($id);
        $order->order_status = $request->input('order_status');
        $order->payment_status = $request->input('payment_status');
        $order->save();

        $notification=  trans('Status updated successfully');
        $notification=array('message'=>$notification,'alert-type'=>'success');

        return back()->with($notification);
    }

    public function paymentStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->payment_status = $request->input('payment_status');
        $order->save();

        $notification=  trans('Payment status updated successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return back()->with($notification);
    }

}
