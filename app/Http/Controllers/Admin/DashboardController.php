<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use Modules\Ecommerce\Entities\Order;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard(){

        $active_orders = Order::where('order_status', Status::APPROVED)->latest()->count();

        $complete_orders = Order::where(function ($query) {
            $query->where('order_status', Status::COMPLETED);
        })->latest()->count();

        $cancel_orders = Order::where(function ($query) {
            $query->where('order_status', Status::REJECTED);
        })->latest()->count();

        $total_orders = Order::count();

        $lable = array();
        $data = array();
        $start = new Carbon('first day of this month');
        $last = new Carbon('last day of this month');
        $first_date = $start->format('Y-m-d');
        $last_date = $last->format('Y-m-d');
        $today = date('Y-m-d');
        $length = date('d')-$start->format('d');

        for($i=1; $i <= $length+1; $i++){

            $date = '';
            if($i == 1){
                $date = $first_date;
            }else{
                $date = $start->addDays(1)->format('Y-m-d');
            };

            $sum = Order::whereDate('created_at', $date)->sum('total');
            $data[] = $sum;
            $lable[] = $i;

        }

        $data = json_encode($data);
        $lable = json_encode($lable);

        $orders = Order::with('order_detail.singleProduct.translate')->latest()->take(10)->get();

        return view('admin.dashboard', [
            'lable' => $lable,
            'data' => $data,
            'active_orders' => $active_orders,
            'complete_orders' => $complete_orders,
            'cancel_orders' => $cancel_orders,
            'total_orders' => $total_orders,
            'orders' => $orders,
        ]);
    }
}
