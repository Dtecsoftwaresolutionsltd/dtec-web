<?php

namespace Modules\Wishlist\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Ecommerce\Entities\Product;
use Modules\Wishlist\App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $item_array = array();
        $user = Auth::guard('web')->user();
        $wishlists  = Product::query()->active()->whereHas('wishlists', function ($query) {
            $query->where('user_id', Auth::id());
        })->latest()->paginate(5);

        return view('wishlist::index', compact('wishlists'));
    }


    public function store(Request $request)
    {
        $user = Auth::guard('web')->user();

        $is_exist = Wishlist::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->first();

        if (!$is_exist) {
            $wishlist = new Wishlist();
            $wishlist->product_id = $request->product_id;
            $wishlist->user_id = $user->id;
            $wishlist->save();

            $notify_message = trans('Item added to wishlist');
            return response()->json(['message' => $notify_message, 'action' => 'add']);
        } else {
            // If exists, remove from w ishlist (toggle functionality)
            $is_exist->delete();

            $notify_message = trans('Item removed from wishlist');
            return response()->json(['message' => $notify_message, 'action' => 'remove']);
        }
    }
}
