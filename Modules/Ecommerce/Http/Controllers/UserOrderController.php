<?php

namespace Modules\Ecommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Ecommerce\Entities\Order;
use Modules\Ecommerce\Entities\ProductReview;

class UserOrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myTransactions(Request $request)
    {
        $orders = $this->getOrders($request);
        return view('ecommerce::user.order.transactions', compact('orders'));
    }

    private function getOrders(Request $request)
    {
        $user = Auth::guard('web')->user();
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search');

        $query = $this->getOrderQuery($user, $search);

        return $query->paginate($perPage);
    }

    private function getOrderQuery($user, $search)
    {
        $query = Order::where('user_id', $user->id)
            ->with(['order_detail', 'order_detail.singleProduct']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('order_id', 'like', "%{$search}%")
                    ->orWhere('transaction_id', 'like', "%{$search}%");
            });
        }

        return $query->latest();
    }

    public function reviewSubmit(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);

        $user = Auth::guard('web')->user();

        $review = new \Modules\Ecommerce\Entities\ProductReview();
        $review->user_id = $user->id;
        $review->product_id = $request->input('product_id');
        $review->rating = $request->input('rating');
        $review->reviews = $request->input('reviews');
        $review->save();


        return response()->json([
            'success' => true,
            'message' => 'Review submitted successfully!',
        ], 200);
    }

    public function reviews()
    {
        $user = Auth::guard('web')->user();
        $reviews = ProductReview::where('user_id',$user->id )->latest()->paginate(10);

        return view('user.reviews', compact('reviews'));
    }
}
