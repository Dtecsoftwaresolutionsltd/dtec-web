<?php

namespace App\Providers;

use App\Models\Wishlist;
use Cache;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Modules\Blog\App\Models\BlogCategory;
use Modules\Category\Entities\Category;
use Modules\Currency\App\Models\Currency;
use Modules\Ecommerce\Entities\Cart;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use Modules\Language\App\Models\Language;
use Modules\Menu\Entities\Menu;
use Modules\Page\App\Models\ContactUs;
use Modules\Page\App\Models\CustomPage;
use Modules\Page\App\Models\Footer;
use Modules\SupportTicket\App\Models\SupportTicket;
use Throwable;
use View;

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

                $hero_image = getContent('home_5_hero_section.content', true);
                $cta_content_home_5 = getContent('theme_5_cta_section.content', true);
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

                $contact_us = ContactUs::first();

                $offices = [];
                if ($contact_us) {
                    $offices = [
                        [
                            'name' => 'Rwanda Office',
                            'location' => 'RWANDA: Kubaho Plaza, KG 7 Ave, KIGALI',
                            'email' => $contact_us->email,
                            'phone' => $contact_us->phone,
                            'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.518536715672!2d30.12411607495605!3d-1.953398998044234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca6f8f1234567%3A0x8f1b8b8b8b8b8b8b!2sKubaho%20Plaza%2C%20KG%207%20Ave%2C%20Kigali%2C%20Rwanda!5e0!3m2!1sen!2sbd!4v1701237009812!5m2!1sen!2sbd',
                        ],
                        [
                            'name' => 'India Office',
                            'location' => 'SBC-2 Thejaswini Building, Technopark',
                            'email' => $contact_us->email2,
                            'phone' => $contact_us->phone2,
                            'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.123456789012!2d76.87936007495605!3d8.55800012345678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b05bbb8054aaaaa%3A0x3b4a4e4f4f4f4f4f!2sSBC-2%20Thejaswini%20Building%2C%20Technopark%20Campus%2C%20Thiruvananthapuram%2C%20Kerala%20695581!5e0!3m2!1sen!2sbd!4v1701237009812!5m2!1sen!2sbd',
                        ],
                    ];
                }

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
                $view->with('offices', $offices);

            });
        } catch (Exception $ex) {
            Log::info('AppServiceProvider : '.$ex->getMessage());

            Artisan::call('optimize:clear');
        }
    }
}
