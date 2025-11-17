<?php

namespace Modules\Menu\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Entities\MenuItem;
use Modules\Menu\Entities\MenuItemTranslation;
use Modules\Language\App\Models\Language;

class DefaultMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default header menu
        $headerMenu = Menu::create([
            'name' => 'Header Menu',
            'location' => 'header',
            'is_active' => true,
            'sort_order' => 1
        ]);

        // Default menu items
        $menuItems = [
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
                'title' => 'Products',
                'url' => '/search',
                'target' => '_self',
                'icon' => 'fas fa-shopping-bag',
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
            ]
        ];

        // Create menu items and translations
        foreach ($menuItems as $itemData) {
            $menuItem = MenuItem::create([
                'menu_id' => $headerMenu->id,
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

        // Create footer menu
        $footerMenu = Menu::create([
            'name' => 'Footer Menu',
            'location' => 'footer',
            'is_active' => true,
            'sort_order' => 2
        ]);

        // Footer menu items
        $footerMenuItems = [
            [
                'title' => 'Privacy Policy',
                'url' => '/privacy-policy',
                'target' => '_self',
                'icon' => '',
                'css_class' => '',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'title' => 'Terms & Conditions',
                'url' => '/terms-and-conditions',
                'target' => '_self',
                'icon' => '',
                'css_class' => '',
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'title' => 'Contact Us',
                'url' => '/contact',
                'target' => '_self',
                'icon' => '',
                'css_class' => '',
                'sort_order' => 3,
                'is_active' => true
            ]
        ];

        // Create footer menu items and translations
        foreach ($footerMenuItems as $itemData) {
            $menuItem = MenuItem::create([
                'menu_id' => $footerMenu->id,
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
