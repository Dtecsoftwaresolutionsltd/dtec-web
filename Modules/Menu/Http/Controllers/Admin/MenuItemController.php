<?php

namespace Modules\Menu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Menu\Entities\Menu;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Menu\Entities\MenuItem;
use Modules\Page\App\Models\CustomPage;
use Modules\Language\App\Models\Language;
use Modules\Listing\Entities\Listing;
use Modules\Menu\Entities\MenuItemTranslation;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Menu $menu)
    {
        $admin_main_menu = $menu;
        $admin_menu_items = MenuItem::where('menu_id', $admin_main_menu->id)->with('translations')->get();

        return view('menu::admin.menu-items.index', compact('admin_menu_items','admin_main_menu'));
    }

    private function getRouteList(){
        $customPage=CustomPage::where('status',1)->get();
        $data = [];
        foreach ($customPage as $page) {
            $data[] = [
                'name' => $page->page_name,
                'route' => $page->slug ? '/'.'custom-page/' . $page->slug : null,
            ];
        }
        $services_slug_url=[];
        $services_slug=Listing::where('status','enable')->get();
        foreach ($services_slug as $service) {
            $services_slug_url[]=[
                'name'=>$service->title,
                'route'=>$service->slug ? '/'.'service/' . $service->slug : null,
            ];
        }


        $frontendRoutes =array_merge($data,$services_slug_url, [
            // Main Pages
            ['name' => 'Home', 'route' => '/'],
            ['name' => 'Services', 'route' => '/services'],
            ['name' => 'About Us', 'route' => '/about-us'],
            ['name' => 'Contact Us', 'route' => '/contact-us'],
            ['name' => 'Blog', 'route' => '/blogs'],
            ['name'=>'Projects', 'route' => '/portfolio'],
            ['name'=>'Team Members', 'route' => '/teams'],
            ['name' => 'FAQ', 'route' => '/faq'],
            ['name'=>'Shop','route'=> '/shop'],
            ['name'=>'Cart View','route'=> '/cart/view'],
            ['name'=>'Pricing Plan','route'=> '/pricing-plan'],
            ['name'=>'Create Support Ticket','route'=> '/user/ticket-support/create'],
            ['name'=>'Cart View','route'=> '/cart/view'],
            ['name'=>'Wishlist View','route'=> '/user/wishlist'],

            // Legal Pages
            ['name' => 'Privacy Policy', 'route' => '/privacy-policy'],
            ['name' => 'Terms & Conditions', 'route' => '/terms-conditions'],

            // User Account Pages
            ['name' => 'User Login', 'route' => '/user/login'],
            ['name' => 'User Register', 'route' => '/user/register'],
            ['name' => 'User Dashboard', 'route' => '/user/dashboard'],
            ['name' => 'User Profile', 'route' => '/user/edit-profile'],
            ['name' => 'User Orders', 'route' => '/user/orders'],
            ['name' => 'Transaction History', 'route' => '/user/transactions/history'],
            ['name' => 'User Reviews', 'route' => '/user/order/my/reviews'],
            ['name'=>'Change Password', 'route' => '/user/change-password'],
        ]);

        return $frontendRoutes;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Menu $menu)
    {

       $menu_id=$menu;
        $frontendRoutes = $this->getRouteList();

        $languages = config('app.available_locales', ['en']);
        $parentItems = $menu->allMenuItems()->active()->get();
        return view('menu::admin.menu-items.create', compact('menu_id', 'languages', 'parentItems','frontendRoutes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Menu $menu)
    {
        $id=$menu->id;
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:500',
            'target' => 'required|string|in:_self,_blank,_parent,_top',
            'icon' => 'nullable|string|max:100',
            'css_class' => 'nullable|string|max:100',
            'parent_id' => 'nullable|exists:menu_items,id',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        DB::transaction(function () use ($request, $menu) {
            $menuItem = MenuItem::create([
                'menu_id' => $menu->id,
                'parent_id' => $request->parent_id,
                'title' => $request->title,
                'url' => $request->url === 'custom' ? $request->custom_url : $request->url,
                'target' => $request->target,
                'icon' => $request->icon,
                'css_class' => $request->css_class,
                'is_active' => $request->boolean('is_active', true),
                'sort_order' => $request->sort_order ?? 0,
            ]);

            // Create translations
            $languages = Language::all();
            foreach($languages as $language){
                $menuItem_translation = new MenuItemTranslation();
                $menuItem_translation->menu_item_id = $menuItem->id;
                $menuItem_translation->locale =  $language->lang_code;
                $menuItem_translation->title = $request->title;
                $menuItem_translation->save();
            }
        });

        \Illuminate\Support\Facades\Artisan::call('cache:clear');

        $notification= trans('Menu Item Created Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.menus.menu-items.index', $id)->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuItem $menuItem)
    {
        $menu = $menuItem->menu;
        $menuItem->load(['children', 'translations']);
        return view('menu::admin.menu-items.show', compact('menu', 'menuItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $frontendRoutes = $this->getRouteList();

        $menuItem = MenuItem::find($request->menu_id);
        $menu = $menuItem->menu;
        $menuItem->load('translations');
        $menu_translate = MenuItemTranslation::where('menu_item_id', $request->menu_id)->where('locale', $request->lang_code)->first();
        $parentItems = $menu->allMenuItems()->where('id', '!=', $menuItem->id)->active()->get();
        return view('menu::admin.menu-items.edit', compact('menu', 'menuItem', 'parentItems','menu_translate','frontendRoutes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        $menu = $menuItem->menu;

        DB::transaction(function () use ($request, $menuItem) {
            // Update menu item fields (only for admin language)
            if (admin_lang() == $request->lang_code) {
                $menuItem->update([
                    'parent_id' => $request->parent_id ?: null,
                    'url' => $request->url === 'custom' ? $request->custom_url : $request->url,
                    'target' => $request->target,
                    'icon' => $request->icon,
                    'css_class' => $request->css_class,
                    'is_active' => $request->boolean('is_active', true),
                    'sort_order' => $request->sort_order ?? 0,
                ]);
            }

            // Update translation
            $menuItem_translate = MenuItemTranslation::where('id', $request->translate_id)
                                                   ->where('menu_item_id', $menuItem->id)
                                                   ->where('locale', $request->lang_code)
                                                   ->first();

            if ($menuItem_translate) {
                $menuItem_translate->update([
                    'title' => $request->title,
                ]);
            }
        });

        \Illuminate\Support\Facades\Artisan::call('cache:clear');

        $notification = trans('Menu Item Updated Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.menus.menu-items.index', $menu)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItem $menuItem)
    {
        $menu = $menuItem->menu;
        $menuItem->delete();

        \Illuminate\Support\Facades\Artisan::call('cache:clear');

        $notification= trans('Menu Item Deleted Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.menus.menu-items.index', $menu)->with($notification);
    }

    /**
     * Toggle menu item active status.
     */
    public function toggleStatus(MenuItem $menuItem)
    {
        $menuItem->update(['is_active' => !$menuItem->is_active]);

        \Illuminate\Support\Facades\Artisan::call('cache:clear');

        return response()->json(['success' => true, 'is_active' => $menuItem->is_active]);
    }

    /**
     * Update menu items order.
     */
    public function updateOrder(Request $request, Menu $menu)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:menu_items,id',
            'items.*.sort_order' => 'required|integer|min:0',
            'items.*.parent_id' => 'nullable|exists:menu_items,id',
        ]);

        foreach ($request->items as $item) {
            MenuItem::where('id', $item['id'])->update([
                'sort_order' => $item['sort_order'],
                'parent_id' => $item['parent_id'] ?? null,
            ]);
        }

        \Illuminate\Support\Facades\Artisan::call('cache:clear');

        return response()->json(['success' => true]);
    }
}
