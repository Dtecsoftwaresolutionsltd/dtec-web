<?php

use Modules\Subscription\Http\Controllers\Admin\SubscriptionPlanController;
use Modules\Subscription\Http\Controllers\User\SubscriptionHistory as UserSubscriptionHistoryController;
use Modules\Subscription\Http\Controllers\Admin\SubscriptionLogController;

// Subscription purchase routes
use Modules\Subscription\Http\Controllers\SubscriptionPurchase\SubscriptionCheckoutController;
use Modules\Subscription\Http\Controllers\SubscriptionPurchase\SubscriptionPaymentController;
use Modules\Subscription\Http\Controllers\SubscriptionPurchase\UserPaypalSubscriptionController;

//Admin routes
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::resource('subscription-plan', SubscriptionPlanController::class);

    Route::get('purchase-history', [SubscriptionLogController::class, 'index'])->name('purchase-history');
    Route::get('pending-purchase-history', [SubscriptionLogController::class, 'pending_index'])->name('pending-purchase-history');

    Route::get('purchase-history-detail/{id}', [SubscriptionLogController::class, 'show'])->name('purchase-history-detail');
    Route::delete('purchase-history-destroy/{id}', [SubscriptionLogController::class, 'destroy'])->name('purchase-history-destroy');
    Route::post('purchase-history-payment-approved/{id}', [SubscriptionLogController::class, 'approval_payment'])->name('purchase-history-payment-approved');
});


// User routes
Route::group(['prefix' => 'user/subscriptions','as' => 'user.subscriptions.', 'middleware' => ['web', 'HtmlSpecialchars', 'MaintenanceMode', 'auth:web']], function () {
    Route::get('history', [UserSubscriptionHistoryController::class, 'index'])->name('history');
    Route::get('{order_id}', [UserSubscriptionHistoryController::class, 'show'])->name('show');
});



// Subscription purchase routes
Route::group(['prefix' => 'subscription','as' => 'subscription.','middleware' => ['auth:web']], function () {
    Route::get('/checkout', [SubscriptionCheckoutController::class, 'index'])->name('checkout');
    Route::get('/process-to-payment', [SubscriptionCheckoutController::class, 'processToPayment'])->name('process-to-payment');

    // Payment entry points
    Route::post('/stripe', [SubscriptionPaymentController::class, 'stripe'])->name('stripe');
    Route::post('/bank', [SubscriptionPaymentController::class, 'bank'])->name('bank');
    Route::get('/pay-via-mollie', [SubscriptionPaymentController::class, 'pay_via_mollie'])->name('pay-via-mollie');
    Route::get('/mollie-payment-success', [SubscriptionPaymentController::class, 'mollie_payment_success'])->name('mollie-payment-success');
    Route::get('/pay-via-instamojo', [SubscriptionPaymentController::class, 'pay_via_instamojo'])->name('pay-via-instamojo');
    Route::get('/response-instamojo', [SubscriptionPaymentController::class, 'instamojo_response'])->name('response-instamojo');
    Route::post('/pay-razorpay', [SubscriptionPaymentController::class, 'pay_via_razorpay'])->name('pay-razorpay');
    Route::get('/pay-via-paystack', [SubscriptionPaymentController::class, 'pay_via_payStack'])->name('pay-via-paystack');
    Route::post('/pay-via-flutterwave', [SubscriptionPaymentController::class, 'pay_via_flutterwave'])->name('pay-via-flutterwave');

    // PayPal
    Route::get('/paypal', [UserPaypalSubscriptionController::class, 'paypal'])->name('paypal');
    Route::get('/paypal-success-payment', [UserPaypalSubscriptionController::class, 'paypal_success_payment'])->name('paypal-success-payment');
    Route::get('/paypal-failed-payment', [UserPaypalSubscriptionController::class, 'paypal_failed_payment'])->name('paypal-failed-payment');
});
