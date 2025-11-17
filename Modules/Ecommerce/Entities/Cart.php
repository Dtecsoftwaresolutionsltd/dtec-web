<?php

namespace Modules\Ecommerce\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{

    public $guarded = ['id'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function insertUserToCart($userId, $sessionId)
    {
        try {
            DB::beginTransaction();

            // Update all cart items with the matching session_id to have the user_id
            static::where('session_id', $sessionId)
                ->whereNull('user_id')
                ->update([
                    'user_id' => $userId,
                    'updated_at' => now()
                ]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Cart Update Error: ' . $e->getMessage());
            return false;
        }
    }
}
