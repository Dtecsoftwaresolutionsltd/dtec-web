<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\SectionManageController;
use App\Http\Controllers\Admin\FrontEndManagementController;
use Modules\Wishlist\App\Http\Controllers\WishlistController;
use App\Http\Controllers\Auth\LoginController as UserLoginController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\Auth\RegisterController as UserRegisterController;
use App\Http\Controllers\Admin\OpenAi\OpenAIController;

Route::group(['middleware' => [ 'HtmlSpecialchars', 'MaintenanceMode']], function () {

    // PWA Routes
    Route::prefix('pwa')->name('pwa.')->group(function () {
        Route::get('/manifest', function () {
            $manifest = view('vendor.laravelpwa.manifest')->render();
            return response($manifest, 200, ['Content-Type' => 'application/json']);
        })->name('manifest');

        Route::get('/service-worker', function () {
            $serviceWorker = view('vendor.laravelpwa.service-worker')->render();
            return response($serviceWorker, 200, ['Content-Type' => 'application/javascript']);
        })->name('service-worker.js');
    });

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about-us', [HomeController::class, 'about_us'])->name('about-us');

    Route::get('/download-file/{file}', [HomeController::class, 'download_file'])->name('download-file');

    Route::get('/services', [HomeController::class, 'services'])->name('services');
    Route::get('/service/{slug}', [HomeController::class, 'service'])->name('service');

    Route::get('/products', [HomeController::class, 'products'])->name('products');
    Route::get('/product-detail/{slug}', [HomeController::class, 'product'])->name('product.detail');

    Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
    Route::get('/blog/{slug}', [HomeController::class, 'blog'])->name('blog');
    Route::post('/store-blog-comment/{id}', [HomeController::class, 'store_blog_comment'])->name('store-blog-comment');

    Route::get('/contact-us', [HomeController::class, 'contact_us'])->name('contact-us');
    Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

    Route::get('/teams', [HomeController::class, 'teams'])->name('teams');
    Route::get('/team/{slug}', [HomeController::class, 'teamPerson'])->name('teamPerson');

    Route::get('/pricing-plan', [HomeController::class, 'pricing'])->name('pricing');



    Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');

    Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
    Route::get('/portfolio/search', [HomeController::class, 'projectSearch'])->name('project.search');
    Route::get('/portfolio/{slug}', [HomeController::class, 'portfolioShow'])->name('portfolio.show');

    Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy-policy');
    Route::get('/terms-conditions', [HomeController::class, 'terms_conditions'])->name('terms-conditions');

    Route::get('/custom-page/{slug}', [HomeController::class, 'custom_page'])->name('custom-page');

    Route::get('/language-switcher', [HomeController::class,  'language_switcher'])->name('language-switcher');
    Route::get('/currency-switcher', [HomeController::class, 'currency_switcher'])->name('currency-switcher');

    Route::get('/projects', [HomeController::class, 'projects'])->name('projects');
    Route::get('/project/{slug}', [HomeController::class, 'project'])->name('project');

    Route::group(['as' => 'user.', 'prefix' => 'user'], function(){

        Route::get('/login', [UserLoginController::class, 'custom_login_page'])->name('login');
        Route::post('/store-login', [UserLoginController::class, 'store_login'])->name('store-login');
        Route::get('/logout', [UserLoginController::class, 'seller_logout'])->name('logout');

        Route::get('/forget-password', [UserLoginController::class, 'forget_password'])->name('forget-password');
        Route::post('/send-forget-password', [UserLoginController::class, 'send_custom_forget_pass'])->name('send-forget-password');
        Route::get('/reset-password', [UserLoginController::class, 'custom_reset_password'])->name('reset-password');
        Route::post('/store-reset-password/{token}', [UserLoginController::class, 'store_reset_password'])->name('store-reset-password');

        Route::controller(UserLoginController::class)->group(function () {
            Route::get('login/google', 'redirect_to_google')->name('login-google');
            Route::get('/callback/google', 'google_callback')->name('callback-google');

            Route::get('login/facebook', 'redirect_to_facebook')->name('login-facebook');
            Route::get('/callback/facebook', 'facebook_callback')->name('callback-facebook');
        });

        // Dynamic location routes
        Route::get('/get-states', [ProfileController::class, 'getStates'])->name('get.states');
        Route::get('/get-cities', [ProfileController::class, 'getCities'])->name('get.cities');

        Route::get('/register', [UserRegisterController::class, 'seller_register_page'])->name('register');
        Route::post('/store-register', [UserRegisterController::class, 'store_register'])->name('store-register');
        Route::get('/register-verification', [UserRegisterController::class, 'register_verification'])->name('register-verification');


        Route::post('/update-user-image', [UserProfileController::class, 'updateImage'])->name('update-image');

        Route::group(['middleware' => 'auth:web'],function () {

            Route::get('/dashboard', [UserProfileController::class, 'dashboard'])->name('dashboard');

            Route::get('/edit-profile', [UserProfileController::class, 'edit_profile'])->name('edit-profile');
            Route::put('/update-profile', [UserProfileController::class, 'update_profile'])->name('update-profile');


            // Dynamic location routes
            Route::get('/get-states', [ProfileController::class, 'getStates'])->name('get.states');
            Route::get('/get-cities', [ProfileController::class, 'getCities'])->name('get.cities');

            Route::get('/change-password', [UserProfileController::class, 'change_password'])->name('change-password');
            Route::put('/update-password', [UserProfileController::class, 'update_password'])->name('update-password');

            Route::get('/account-delete', [UserProfileController::class, 'account_delete'])->name('account-delete');
            Route::delete('/confirm-account-delete', [UserProfileController::class, 'confirm_account_delete'])->name('confirm-account-delete');

            Route::get('/orders', [UserProfileController::class, 'orders'])->name('orders');
            Route::get('/order/details/{order_id}', [UserProfileController::class, 'order_show'])->name('order_show');
            Route::get('/transactions/history', [UserProfileController::class, 'transactions'])->name('transactions');

            Route::post('wishlist-set', [WishlistController::class, 'setWishlist']);
        });

    });

});

Route::get('admin', function() {
    return null;
})->middleware('admin.redirect');

/* Admin Code */
Route::group(['as'=> 'admin.', 'prefix' => 'admin'],function (){
    Route::get('login', [LoginController::class, 'custom_login_page'])->name('login');
    Route::post('store-login', [LoginController::class, 'store_login'])->name('store-login');
    Route::post('store-register', [LoginController::class, 'store_register'])->name('store-register');
    Route::post('logout', [LoginController::class, 'admin_logout'])->name('logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', [DashboardController::class, 'dashboard']);
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::controller(ProfileController::class)->group(function(){
            Route::get('edit-profile', 'edit_profile')->name('edit-profile');
            Route::put('profile-update', 'profile_update')->name('profile-update');
            Route::put('update-password', 'update_password')->name('update-password');
        });

        Route::controller(UserController::class)->group(function () {
            Route::get('user-list', 'user_list')->name('user-list');
            Route::get('pending-user', 'pending_user')->name('pending-user');
            Route::get('user-show/{id}', 'user_show')->name('user-show');
            Route::delete('user-delete/{id}', 'user_destroy')->name('user-delete');
            Route::put('user-status/{id}', 'user_status')->name('user-status');
            Route::put('user-update/{id}', 'update')->name('user-update');

            Route::get('feez-profile/{id}', 'user_feez')->name('feez-profile');
        });

        Route::controller(OrderController::class)->group(function () {
            Route::get('orders', 'index')->name('orders');
            Route::get('active-orders', 'active_orders')->name('active-orders');
            Route::get('reject-orders', 'reject_orders')->name('reject-orders');
            Route::get('delivered-orders', 'delivered_orders')->name('delivered-orders');
            Route::get('complete-orders', 'complete_orders')->name('complete-orders');
            Route::get('pending-payment-orders', 'pending_payment_orders')->name('pending-payment-orders');
            Route::post('payment-approval/{id}', 'payment_approval')->name('payment-approval');

            Route::get('order/{id}', 'order_show')->name('order');

            Route::post('/order-complete/{id}', 'order_complete')->name('order-complete');
            Route::post('/order-approved/{id}', 'order_approved')->name('order-approved');
            Route::post('/order-cancel/{id}', 'order_cancel')->name('order-cancel');
            Route::delete('/order-delete/{id}', 'order_delete')->name('order-delete');
        });
        // Frontend Management
        Route::controller(FrontEndManagementController::class)->name('front-end.')->group(function () {
            Route::get('/frontend-section', 'index')->name('frontend-section');
            Route::get('/section/{id}', 'section')->name('section');
            Route::put('store/{key}/{id?}', 'store')->name('store');
        });


        Route::controller(SectionManageController::class)->group(function () {
            Route::get('section-manage', 'index')->name('section-manage');
            Route::get('section-edit/{page}', 'edit')->name('section-edit');
            Route::post('section-update', 'update')->name('section-update');
        });


        // OpenAI routes
        Route::get('/openai', [OpenAIController::class, 'index'])->name('openai.index');
        Route::post('/openai/ask', [OpenAIController::class, 'ask'])->name('openai.ask');
    });
});
