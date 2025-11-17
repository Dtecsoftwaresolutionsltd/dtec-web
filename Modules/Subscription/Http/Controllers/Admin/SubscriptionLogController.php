<?php

namespace Modules\Subscription\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Subscription\Entities\SubscriptionHistory;
use Modules\Subscription\Entities\SubscriptionPlan;

class SubscriptionLogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $histories = SubscriptionHistory::latest()->get();

        return view('subscription::admin.history', ['histories' => $histories]);
    }

    public function pending_index()
    {
        $histories = SubscriptionHistory::where('status', 'pending')->latest()->get();

        return view('subscription::admin.pending_history', ['histories' => $histories]);
    }




    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $history = SubscriptionHistory::findOrFail($id);

        return view('subscription::admin.history_detail', ['history' => $history]);
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $history = SubscriptionHistory::findOrFail($id);
        $history->delete();

        $notification = trans('Deleted Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.purchase-history')->with($notification);
    }

    public function approval_payment($id)
    {
        $history = SubscriptionHistory::findOrFail($id);

        $history->payment_status = 'success';
        $history->status = 'active';

        // Fetch the related plan for expiration logic
        $plan = SubscriptionPlan::find($history->subscription_plan_id);

        if ($plan?->expiration_date === 'monthly') {
            $history->expiration_date = now()->addMonth()->format('Y-m-d');
        } elseif ($plan?->expiration_date === 'yearly') {
            $history->expiration_date = now()->addYear()->format('Y-m-d');
        } elseif ($plan?->expiration_date === 'lifetime') {
            $history->expiration_date = 'lifetime';
        } else {
            $history->expiration_date = $plan?->expiration_date;
        }

        // Store plan information as JSON if not already stored
        if (!$history->plan_info) {
            $history->plan_info = json_encode([$plan]);
        }

        $history->save();


        $notification = trans('Payment approved Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


}
