<?php

namespace Modules\Menu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Entities\MenuTranslation;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Menu List";
        $menus = Menu::with('translation')->orderBy('sort_order')->get();
        return view('menu::admin.menus.index', compact('menus', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Menu";
        $languages = config('app.available_locales', ['en']);
        return view('menu::admin.menus.create', compact('languages', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|in:header,footer,sidebar',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
            'translations' => 'array',
            'translations.*.locale' => 'required|string',
            'translations.*.name' => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($request) {
            $menu = Menu::create([
                'name' => $request->name,
                'location' => $request->location,
                'is_active' => $request->boolean('is_active', true),
                'sort_order' => $request->sort_order ?? 0,
            ]);

            // Create translations
            if ($request->has('translations')) {
                foreach ($request->translations as $translation) {
                    MenuTranslation::create([
                        'menu_id' => $menu->id,
                        'locale' => $translation['locale'],
                        'name' => $translation['name'],
                    ]);
                }
            }
        });

        $notification= trans('Menu Created Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.menus.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        $menu->load(['menuItems.children', 'translations']);
        return view('menu::admin.menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $menu->load('translations');
        $languages = config('app.available_locales', ['en']);
        return view('menu::admin.menus.edit', compact('menu', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|in:header,footer,sidebar',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        DB::transaction(function () use ($request, $menu) {
            $menu->update([
                'name' => $request->name,
                'location' => $request->location,
                'is_active' => $request->boolean('is_active', true),
                'sort_order' => $request->sort_order ?? 0,
            ]);
        });

        $notification= trans('Menu Updated Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.menus.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        $notification= trans('Menu Deleted Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.menus.index')->with($notification);
    }

    /**
     * Toggle menu active status.
     */
    public function toggleStatus(Menu $menu)
    {
        $menu->update(['is_active' => !$menu->is_active]);
        return response()->json(['success' => true, 'is_active' => $menu->is_active]);
    }
} 