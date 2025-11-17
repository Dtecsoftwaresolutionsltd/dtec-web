<?php

namespace Modules\Coupon\App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Modules\Coupon\App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Modules\Coupon\App\Models\CouponHistory;
use Modules\Coupon\App\Http\Requests\CouponRequest;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::latest()->get();

        return view('coupon::index', ['coupons' => $coupons]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coupon::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->expired_date = $request->expired_date;
        $coupon->min_purchase_price = $request->min_purchase_price;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount_amount = $request->discount_amount;
        $coupon->status = $request->status ? 'enable' : 'disable';
        $coupon->save();

        $notify_message = trans('Created successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.coupon.index')->with($notify_message);


    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);

        return view('coupon::edit', ['coupon' => $coupon]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->expired_date = $request->expired_date;
        $coupon->min_purchase_price = $request->min_purchase_price;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount_amount = $request->discount_amount;
        $coupon->status = $request->status ? 'enable' : 'disable';
        $coupon->save();

        $notify_message = trans('Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.coupon.index')->with($notify_message);

    }

    public function apply_coupon(Request $request)
    {
       $rules = [
            'coupon'=>'required|exists:coupons,code',
        ];
        $customMessages = [
            'coupon.required' => trans('Coupon is required'),
        ];
        $this->validate($request, $rules, $customMessages);
        $user=Auth::guard('web')->user();
        $cuponHistory =CouponHistory::where('user_id', $user->id)->where('coupon_code', $request->coupon)->first();

        if($cuponHistory){
            $notification = array(
                'message' => trans('Coupon already applied'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        if(session::get('cupon_code') == $request->coupon){
            $notification = array(
                'message' => trans('Coupon already applied'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        $coupon = Coupon::where('code', $request->coupon)->where('status', 'enable')->first();
        if(!$coupon){
            $notification = array(
                'message' => trans('Coupon not found'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        if(Carbon::parse($coupon->expired_date)->isPast()){
            $notification = array(
                'message' => trans('Coupon is expired'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        if($request->subtotal < $coupon->min_purchase_price){
            $notification = array(
                'message' => trans('Minimum purchase price is not enough'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        Session::put('cupon_code', $coupon->code);
        Session::put('type', $coupon->discount_type);
        Session::put('discount_amount', $coupon->discount_amount);

        $notification = array(
            'message' => trans('Coupon applied successfully'),
            'alert-type' => 'success'
        );
        return back()->with($notification);

    }

    public function coupon_history_list(){

        $coupons_histories = CouponHistory::with('user')->latest()->get();
        return view('coupon::admin.coupon_history_list', compact('coupons_histories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        $notify_message = trans('Deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.coupon.index')->with($notify_message);

    }
}
