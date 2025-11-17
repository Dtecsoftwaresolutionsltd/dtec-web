<?php

namespace App\Providers;

use View;
use Cache;
use Exception;
use Throwable;
use App\Models\Wishlist;
use Modules\Menu\Entities\Menu;
use Illuminate\Support\Facades\Log;
use Modules\Page\App\Models\Footer;
use Illuminate\Support\Facades\Auth;
use Modules\Ecommerce\Entities\Cart;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Modules\Category\Entities\Category;
use Modules\Page\App\Models\CustomPage;
use Modules\Blog\App\Models\BlogCategory;
use Modules\Currency\App\Models\Currency;
use Modules\Language\App\Models\Language;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use Modules\SupportTicket\App\Models\SupportTicket;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        try {
            $setting = Cache::rememberForever('setting', function () {
                $setting_data = GlobalSetting::get();

                $setting = array();

                foreach ($setting_data as $data_item) {
                    $setting[$data_item->key] = $data_item->value;
                }

                $setting = (object) $setting;

                return $setting;
            });


            $timezone_setting = Cache::get('setting');

            config(['app.timezone' => $timezone_setting->timezone]);
            date_default_timezone_set($timezone_setting->timezone);

            View::composer('*', function ($view) {

                $hero_image=getContent('home_5_hero_section.content', true);
                 $cta_content_home_5=getContent('theme_5_cta_section.content', true);
                 $testimonial_content_5 = getContent('theme_5_testimonial_section.content', true);

                $general_setting = Cache::get('setting');
                $language_list = Language::where('status', 1)->get();
                $currency_list = Currency::where('status', 'active')->get();
                $custom_pages = CustomPage::where('status', 1)->get();

                if (Auth::guard('web')->check()) {
                    $cart_count = Cart::where('user_id', Auth::guard('web')->id())->count();
                } else {
                    $cart_count = Cart::where('session_id', session()->getId())->count();
                }

                $footer_categories = Category::where('status', 'enable')->latest()->take(7)->get();
                $footer_blog_categories = BlogCategory::where('status', 1)->latest()->take(7)->get();

                $menu = Menu::where('is_active', 1)->where('location', 'header')->orderBy('sort_order', 'asc')->first();
                if ($menu) {
                    $menu_items = $menu->allMenuItems()->where('is_active', 1)->get();
                } else {
                    $menu_items = collect();
                }

                $footer_menu = Menu::where('is_active', 1)->where('location', 'footer')->orderBy('sort_order', 'asc')->first();
                if ($footer_menu) {
                    $footer_menus = $footer_menu->allMenuItems()->where('is_active', 1)->get();
                } else {
                    $footer_menus = collect();
                }


                $wishlist_count = 0;

                if (Auth::guard('web')->check()) {
                    $user_d = Auth::guard('web')->id();

                    $wishlist_count = Wishlist::where('user_id', $user_d)->count();
                }



                $footer = Footer::first();
                $userId = auth()->id();

                // Total unseen support messages for admin
                $total_unseen_support_messages_for_admin = SupportTicket::getTotalUnseenMessagesForAdmin();
                // Total unseen support messages for user
                $total_unseen_support_messages_for_user = SupportTicket::getTotalUnseenMessagesForUser($userId);

                $view->with('general_setting', $general_setting);
                $view->with('language_list', $language_list);
                $view->with('currency_list', $currency_list);
                $view->with('footer', $footer);
                $view->with('custom_pages', $custom_pages);
                $view->with('footer_categories', $footer_categories);
                $view->with('footer_blog_categories', $footer_blog_categories);
                $view->with('menu', $menu);
                $view->with('menu_items', $menu_items);
                $view->with('footer_menu', $footer_menu);
                $view->with('footer_menus', $footer_menus);
                $view->with('cart_count', $cart_count);
                $view->with('wishlist_count', $wishlist_count);
                $view->with('total_unseen_support_messages_for_admin', $total_unseen_support_messages_for_admin);
                $view->with('total_unseen_support_messages_for_user', $total_unseen_support_messages_for_user);
                $view->with('hero_image', $hero_image);
                 $view->with('cta_content_home_5', $cta_content_home_5);
                     $view->with('testimonial_content_5', $testimonial_content_5);

                
            });
        } catch (Exception $ex) {
            Log::info('AppServiceProvider : ' . $ex->getMessage());

            Artisan::call('optimize:clear');
        }
    }
}
