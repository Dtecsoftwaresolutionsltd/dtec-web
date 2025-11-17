<?php

namespace Modules\Menu\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Entities\MenuItem;
use Modules\Menu\Entities\MenuItemTranslation;
use Modules\Language\App\Models\Language;

class MobileMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create mobile menu
        $mobileMenu = Menu::create([
            'name' => 'Mobile Menu',
            'location' => 'mobile',
            'is_active' => true,
            'sort_order' => 4
        ]);

        // Mobile menu items
        $mobileMenuItems = [
            [
                'title' => 'Home',
                'url' => '/',
                'target' => '_self',
                'icon' => 'fas fa-home',
                'css_class' => '',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'title' => 'Categories',
                'url' => '/categories',
                'target' => '_self',
                'icon' => 'fas fa-th-large',
                'css_class' => '',
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'title' => 'About',
                'url' => '/about',
                'target' => '_self',
                'icon' => 'fas fa-info-circle',
                'css_class' => '',
                'sort_order' => 3,
                'is_active' => true
            ],
            [
                'title' => 'Offer',
                'url' => '/offer',
                'target' => '_self',
                'icon' => 'fas fa-gift',
                'css_class' => '',
                'sort_order' => 4,
                'is_active' => true
            ],
            [
                'title' => 'Contact Us',
                'url' => '/contact',
                'target' => '_self',
                'icon' => 'fas fa-envelope',
                'css_class' => '',
                'sort_order' => 5,
                'is_active' => true
            ],
            [
                'title' => 'Blog',
                'url' => '/blog',
                'target' => '_self',
                'icon' => 'fas fa-blog',
                'css_class' => '',
                'sort_order' => 6,
                'is_active' => true
            ],
            [
                'title' => 'My Dashboard',
                'url' => '/user/dashboard',
                'target' => '_self',
                'icon' => 'fas fa-tachometer-alt',
                'css_class' => '',
                'sort_order' => 7,
                'is_active' => true
            ],
            [
                'title' => 'Sign In',
                'url' => '/user/login',
                'target' => '_self',
                'icon' => 'fas fa-sign-in-alt',
                'css_class' => '',
                'sort_order' => 8,
                'is_active' => true
            ]
        ];

        // Create mobile menu items and translations
        foreach ($mobileMenuItems as $itemData) {
            $menuItem = MenuItem::create([
                'menu_id' => $mobileMenu->id,
                'parent_id' => null,
                'title' => $itemData['title'],
                'url' => $itemData['url'],
                'target' => $itemData['target'],
                'icon' => $itemData['icon'],
                'css_class' => $itemData['css_class'],
                'sort_order' => $itemData['sort_order'],
                'is_active' => $itemData['is_active']
            ]);

            // Create translations for all languages
            $languages = Language::all();
            foreach ($languages as $language) {
                MenuItemTranslation::create([
                    'menu_item_id' => $menuItem->id,
                    'locale' => $language->lang_code,
                    'title' => $itemData['title']
                ]);
            }
        }
    }
}
