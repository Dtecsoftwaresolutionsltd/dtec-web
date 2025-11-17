<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Ecommerce\Entities\Order;
use Modules\Ecommerce\Entities\OrderDetail;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('order_detail.singleProduct.translate')->latest()->get();

        $title = trans('All Order');

        return view('admin.order_list', [
            'orders' => $orders,
            'title' => $title,
        ]);
    }


    public function active_orders(){


        $orders = Order::with('order_detail.singleProduct.translate')->where(['order_status' => \App\Constants\Status::PROCESSING])->latest()->get();

        $title = trans('Active Order');

        return view('admin.order_list', [
            'orders' => $orders,
            'title' => $title,
        ]);
    }


    public function reject_orders(){

        $orders = Order::with('order_detail.singleProduct.translate')->where(['order_status' => \App\Constants\Status::REJECTED])->latest()->get();

        $title = trans('Rejected Order');

        return view('admin.order_list', [
            'orders' => $orders,
            'title' => $title,
        ]);
    }

    public function delivered_orders(){

        $orders = Order::with('order_detail.singleProduct.translate')->where(['order_status' => \App\Constants\Status::SHIPPED])->latest()->get();

        $title = trans('Delivered Order');

        return view('admin.order_list', [
            'orders' => $orders,
            'title' => $title,
        ]);
    }

    public function complete_orders(){

        $orders = Order::with('order_detail.singleProduct.translate')->where(['order_status' => \App\Constants\Status::COMPLETED])->latest()->get();

        $title = trans('Complete Order');

        return view('admin.order_list', [
            'orders' => $orders,
            'title' => $title,
        ]);
    }

    public function pending_payment_orders(){

        $orders = Order::where('payment_status', 'pending')->latest()->get();

        $title = trans('Pending Payment Order');

        return view('admin.pending_payment_orders', [
            'orders' => $orders,
            'title' => $title,
        ]);
    }

    public function order_show($order_id){

        $order = Order::with('order_detail')->where('order_id', $order_id)->first();
        $seller = User::findOrFail($order->user_id);

        return view('admin.order_show', [
            'order' => $order,
            'seller' => $seller,
        ]);
    }



    public function order_delete(Request $request, $id){

        $order = Order::where('id', $id)->first();
        OrderDetail::where('order_id', $order->id)->delete();
        $order->delete();

        $notify_message = trans('Order delete successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.orders')->with($notify_message);
    }


}
