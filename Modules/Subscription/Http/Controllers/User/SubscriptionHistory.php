<?php

namespace Modules\Subscription\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Subscription\Entities\SubscriptionHistory as SubscriptionHistoryModel;

class SubscriptionHistory extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::guard('web')->user();

        $perPage = (int) $request->input('per_page', 10);
        $search = $request->input('search');

        $query = SubscriptionHistoryModel::where('user_id', $user->id);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('order_id', 'like', "%{$search}%")
                  ->orWhere('plan_name', 'like', "%{$search}%")
                  ->orWhere('payment_method', 'like', "%{$search}%")
                  ->orWhere('transaction', 'like', "%{$search}%");
            });
        }

        $histories = $query->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'search' => $search]);

        return view('subscription::User.subscription_history', compact('histories'));
    }

    public function show($order_id)
    {
        $user = Auth::guard('web')->user();
        $history = SubscriptionHistoryModel::where('user_id', $user->id)
            ->where('order_id', $order_id)
            ->firstOrFail();

        return view('subscription::User.subscription_show', compact('history'));
    }
}


