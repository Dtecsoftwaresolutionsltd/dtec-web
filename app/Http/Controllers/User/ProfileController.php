<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordChangeRequest;
use Modules\Ecommerce\Entities\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Image;
use Modules\City\Entities\City;
use Modules\Country\Entities\Country;
use Modules\State\App\Models\State;
use Modules\State\App\Models\StateTranslation;
use Str;

class ProfileController extends Controller
{
    public function dashboard(){

        $user = Auth::guard('web')->user();

        $orders = Order::where('user_id', $user->id)->latest()->paginate(5);
        $order_count = Order::where('user_id', $user->id)->count();

        $pending_orders = Order::where('user_id', $user->id)->where(['order_status' => 0])->latest()->count();

        $complete_orders = Order::where('user_id', $user->id)->where(function ($query) {
            $query->where('order_status', 1);
        })->latest()->count();

        $total = Order::where('user_id', $user->id)
            ->latest()
            ->sum('total');

        return view('user.dashboard', [
            'pending_orders' => $pending_orders,
            'complete_orders' => $complete_orders,
            'total' => $total,
            'orders' => $orders,
            'user' => $user,
            'order_count' => $order_count,
        ]);
    }

    /**
     * Get states by country ID via AJAX
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStates(Request $request)
    {
        $countryId = $request->country_id;
        $states = State::where('country_id', $countryId)->get();

        return response()->json($states);
    }

    /**
     * Get cities by state ID via AJAX
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCities(Request $request)
    {
        $stateId = $request->state_id;
        $cities = City::where('state_id', $stateId)->get();

        return response()->json($cities);
    }



    /**
     * Show the form for editing the user profile
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit_profile(){

        $user = Auth::guard('web')->user();

        return view('user.edit_profile', ['user' => $user]);
    }

    public function update_profile(Request $request){

        $user = Auth::guard('web')->user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->zip = $request->zip;
        $user->country_id = $request->country;
        $user->state_id = $request->state;
        $user->city_id = $request->city;
        $user->save();

        if($request->file('image')){
            $old_image = $user->image;
            $user_image = $request->image;
            $extention = $user_image->getClientOriginalExtension();
            $image_name = Str::slug($user->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($user_image)->save(public_path().'/'.$image_name);
            $user->image = $image_name;
            $user->save();
            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        $notify_message = trans('Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }
    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $user = auth()->user();

        // Delete old image if needed
        if ($user->image && file_exists(public_path($user->image))) {
            unlink(public_path($user->image));
        }

        // Save new image
        $image = $request->file('image');
        $extention = $image->getClientOriginalExtension();
        $image_name = Str::slug($user->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
        $image_name = 'uploads/custom-images/'.$image_name;
        Image::make($image)->save(public_path().'/'.$image_name);

        $user->image = $image_name;
        $user->save();

        return response()->json([
            'image_url' => asset($image_name)
        ]);
    }

    public function change_password(){

        $user = Auth::guard('web')->user();

        return view('user.change_password', ['user' => $user]);
    }

    public function update_password(PasswordChangeRequest $request){

        $user = Auth::guard('web')->user();

        if(Hash::check($request->current_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();

            $notify_message = trans('Password changed successfully');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->back()->with($notify_message);

        }else{
            $notify_message = trans('Current password does not match');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }


    }

    public function orders(Request $request)
    {
        $user = Auth::guard('web')->user();

        // Get per_page value or default to 10
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');

        $query = Order::with('order_detail')->where('user_id', $user->id);

        // Apply status filter
        if($search){
            $query = Order::with('order_detail.singleProduct')->where('user_id', $user->id);
            $query->where(function ($q) use ($search) {
                $q->where('order_id', 'like', "%{$search}%")
                    ->orWhere('transaction_id', 'like', "%{$search}%");
            });
        }

        $orders = $query->orderBy('created_at', 'desc')
                        ->paginate($perPage)
                        ->appends([
                            'per_page' => $perPage,
                            'search' => $search,
                        ]);

        return view('user.orders', compact('orders'));
    }

    public function transactions(Request $request)
    {
        $user = Auth::guard('web')->user();

        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');

        $query = Order::with('order_detail')->where('user_id', $user->id);

        if ($search === 'Pending') {
            $query->where('order_status', 0);
        } elseif ($search === 'Completed') {
            $query->where('order_status', 1);
        }

        $orders = $query->orderBy('created_at', 'desc')
                        ->paginate($perPage)
                        ->appends([
                            'per_page' => $perPage,
                            'search' => $search,
                        ]);

        return view('user.transactions', ['orders' => $orders]);
    }


    public function order_show($order_id){

        $user = Auth::guard('web')->user();
        $order = Order::with('order_detail')->where('user_id', $user->id)->where('order_id', $order_id)->first();


        return view('user.order_show', [
            'order' => $order,
            'user' => $user,
        ]);
    }

    public function account_delete(){
        return view('user.account_delete');
    }

    public function confirm_account_delete(Request $request)
    {
        try {
            $user = Auth::guard('web')->user();

            if (!$user) {
                Log::warning('Account deletion attempt failed: User not found');
                return redirect()
                    ->back()
                    ->with([
                        'message' => 'User not found',
                        'alert-type' => 'error'
                    ]);
            }

            if (!Hash::check($request->password, $user->password)) {
                Log::warning('Account deletion failed: Password mismatch for user ' . $user->id);
                return redirect()
                    ->back()
                    ->with([
                        'message' => trans('Password does not match. Please try again.'),
                        'alert-type' => 'error'
                    ]);
            }

            DB::beginTransaction();

            try {
                // Handle image deletion
                if ($user->image) {
                    $imagePath = public_path($user->image);
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                        Log::info('Deleted image for user: ' . $user->id);
                    } else {
                        Log::warning('Image not found or already null for user: ' . $user->id);
                    }
                }

                // Delete related records
                DB::table('product_reviews')->where('user_id', $user->id)->delete();
                DB::table('orders')->where('user_id', $user->id)->delete();
                DB::table('wishlists')->where('user_id', $user->id)->delete();
                DB::table('carts')->where('user_id', $user->id)->delete();

                // Force delete the user
                DB::enableQueryLog(); // Start query logging
                $user->forceDelete();
                Log::info('Query log after force delete: ', DB::getQueryLog());

                // Confirm user deletion
                $userExists = DB::table('users')->where('id', $user->id)->exists();
                if ($userExists) {
                    throw new \Exception('User still exists in the database after forceDelete.');
                }

                DB::commit();

                Auth::guard('web')->logout();
                Session::flush();

                Log::info('Successfully deleted account for user: ' . $user->id);

                $notification = [
                    'message' => trans('Your account deleted successful'),
                    'alert-type' => 'success'
                ];

                return redirect()->route('home')->with('notification', $notification);

            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Account deletion transaction failed for user ' . $user->id . ': ' . $e->getMessage());
                return redirect()
                    ->back()
                    ->with([
                        'message' => 'Failed to delete account: ' . $e->getMessage(),
                        'alert-type' => 'error'
                    ]);
            }
        } catch (\Exception $e) {
            Log::error('Account deletion pre-check failed: ' . $e->getMessage());
            return redirect()
                ->back()
                ->with([
                    'message' => trans('Something went wrong. Please try again.'),
                    'alert-type' => 'error'
                ]);
        }
    }

}
