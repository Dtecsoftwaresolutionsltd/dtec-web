<?php

namespace Modules\Menu\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Entities\MenuItem;
use Modules\Menu\Entities\MenuItemTranslation;
use Modules\Language\App\Models\Language;

class AdditionalMenuItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing header menu or create new one
        $headerMenu = Menu::where('location', 'header')->first();

        if (!$headerMenu) {
            $headerMenu = Menu::create([
                'name' => 'Header Menu',
                'location' => 'header',
                'is_active' => true,
                'sort_order' => 1
            ]);
        }

        // Additional menu items with dropdowns
        $additionalMenuItems = [
            // Main navigation items
            [
                'title' => 'Restaurants',
                'url' => '/all-restaurant',
                'target' => '_self',
                'icon' => 'fas fa-utensils',
                'css_class' => '',
                'sort_order' => 3,
                'is_active' => true,
                'children' => [
                    [
                        'title' => 'All Restaurants',
                        'url' => '/all-restaurant',
                        'target' => '_self',
                        'icon' => 'fas fa-list',
                        'css_class' => '',
                        'sort_order' => 1,
                        'is_active' => true
                    ],
                    [
                        'title' => 'Cuisines',
                        'url' => '/cuisines',
                        'target' => '_self',
                        'icon' => 'fas fa-utensils',
                        'css_class' => '',
                        'sort_order' => 2,
                        'is_active' => true
                    ],
                    [
                        'title' => 'Apply for Restaurant',
                        'url' => '/apply-restaurant',
                        'target' => '_self',
                        'icon' => 'fas fa-plus-circle',
                        'css_class' => '',
                        'sort_order' => 3,
                        'is_active' => true
                    ]
                ]
            ],
            [
                'title' => 'User Account',
                'url' => '#',
                'target' => '_self',
                'icon' => 'fas fa-user',
                'css_class' => '',
                'sort_order' => 7,
                'is_active' => true,
                'children' => [
                    [
                        'title' => 'Login',
                        'url' => '/user/login',
                        'target' => '_self',
                        'icon' => 'fas fa-sign-in-alt',
                        'css_class' => '',
                        'sort_order' => 1,
                        'is_active' => true
                    ],
                    [
                        'title' => 'Register',
                        'url' => '/register',
                        'target' => '_self',
                        'icon' => 'fas fa-user-plus',
                        'css_class' => '',
                        'sort_order' => 2,
                        'is_active' => true
                    ],
                    [
                        'title' => 'Dashboard',
                        'url' => '/user/dashboard',
                        'target' => '_self',
                        'icon' => 'fas fa-tachometer-alt',
                        'css_class' => '',
                        'sort_order' => 3,
                        'is_active' => true
                    ],
                    [
                        'title' => 'My Orders',
                        'url' => '/user/orders',
                        'target' => '_self',
                        'icon' => 'fas fa-shopping-bag',
                        'css_class' => '',
                        'sort_order' => 4,
                        'is_active' => true
                    ]
                ]
            ],
            [
                'title' => 'Restaurant Account',
                'url' => '#',
                'target' => '_self',
                'icon' => 'fas fa-store',
                'css_class' => '',
                'sort_order' => 8,
                'is_active' => true,
                'children' => [
                    [
                        'title' => 'Restaurant Login',
                        'url' => '/restaurant/login',
                        'target' => '_self',
                        'icon' => 'fas fa-sign-in-alt',
                        'css_class' => '',
                        'sort_order' => 1,
                        'is_active' => true
                    ],
                    [
                        'title' => 'Restaurant Dashboard',
                        'url' => '/restaurant/dashboard',
                        'target' => '_self',
                        'icon' => 'fas fa-tachometer-alt',
                        'css_class' => '',
                        'sort_order' => 2,
                        'is_active' => true
                    ]
                ]
            ],
            [
                'title' => 'Help & Support',
                'url' => '#',
                'target' => '_self',
                'icon' => 'fas fa-question-circle',
                'css_class' => '',
                'sort_order' => 9,
                'is_active' => true,
                'children' => [
                    [
                        'title' => 'Contact Us',
                        'url' => '/contact-us',
                        'target' => '_self',
                        'icon' => 'fas fa-envelope',
                        'css_class' => '',
                        'sort_order' => 1,
                        'is_active' => true
                    ],
                    [
                        'title' => 'Privacy Policy',
                        'url' => '/privacy-policy',
                        'target' => '_self',
                        'icon' => 'fas fa-shield-alt',
                        'css_class' => '',
                        'sort_order' => 2,
                        'is_active' => true
                    ],
                    [
                        'title' => 'Terms & Conditions',
                        'url' => '/terms-and-conditions',
                        'target' => '_self',
                        'icon' => 'fas fa-file-contract',
                        'css_class' => '',
                        'sort_order' => 3,
                        'is_active' => true
                    ]
                ]
            ]
        ];

        // Create additional menu items
        foreach ($additionalMenuItems as $itemData) {
            $children = $itemData['children'] ?? [];
            unset($itemData['children']);

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

            // Create translations for parent item
            $languages = Language::all();
            foreach ($languages as $language) {
                MenuItemTranslation::create([
                    'menu_item_id' => $menuItem->id,
                    'locale' => $language->lang_code,
                    'title' => $itemData['title']
                ]);
            }

            // Create children items
            foreach ($children as $childData) {
                $childMenuItem = MenuItem::create([
                    'menu_id' => $headerMenu->id,
                    'parent_id' => $menuItem->id,
                    'title' => $childData['title'],
                    'url' => $childData['url'],
                    'target' => $childData['target'],
                    'icon' => $childData['icon'],
                    'css_class' => $childData['css_class'],
                    'sort_order' => $childData['sort_order'],
                    'is_active' => $childData['is_active']
                ]);

                // Create translations for child item
                foreach ($languages as $language) {
                    MenuItemTranslation::create([
                        'menu_item_id' => $childMenuItem->id,
                        'locale' => $language->lang_code,
                        'title' => $childData['title']
                    ]);
                }
            }
        }

        // Create footer menu with additional items
        $footerMenu = Menu::where('location', 'footer')->first();

        if (!$footerMenu) {
            $footerMenu = Menu::create([
                'name' => 'Footer Menu',
                'location' => 'footer',
                'is_active' => true,
                'sort_order' => 2
            ]);
        }

        // Additional footer menu items
        $footerMenuItems = [
            [
                'title' => 'About Us',
                'url' => '/about-us',
                'target' => '_self',
                'icon' => 'fas fa-info-circle',
                'css_class' => '',
                'sort_order' => 4,
                'is_active' => true
            ],
            [
                'title' => 'Blog',
                'url' => '/blog',
                'target' => '_self',
                'icon' => 'fas fa-blog',
                'css_class' => '',
                'sort_order' => 5,
                'is_active' => true
            ],
            [
                'title' => 'Offers & Deals',
                'url' => '/offer',
                'target' => '_self',
                'icon' => 'fas fa-gift',
                'css_class' => '',
                'sort_order' => 6,
                'is_active' => true
            ],
            [
                'title' => 'Search',
                'url' => '/search',
                'target' => '_self',
                'icon' => 'fas fa-search',
                'css_class' => '',
                'sort_order' => 7,
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

        // Create sidebar menu
        $sidebarMenu = Menu::create([
            'name' => 'Sidebar Menu',
            'location' => 'sidebar',
            'is_active' => true,
            'sort_order' => 3
        ]);

        // Sidebar menu items
        $sidebarMenuItems = [
            [
                'title' => 'Quick Links',
                'url' => '#',
                'target' => '_self',
                'icon' => 'fas fa-link',
                'css_class' => 'sidebar-section',
                'sort_order' => 1,
                'is_active' => true,
                'children' => [
                    [
                        'title' => 'Categories',
                        'url' => '/categories',
                        'target' => '_self',
                        'icon' => 'fas fa-th-large',
                        'css_class' => '',
                        'sort_order' => 1,
                        'is_active' => true
                    ],
                    [
                        'title' => 'All Restaurants',
                        'url' => '/all-restaurant',
                        'target' => '_self',
                        'icon' => 'fas fa-utensils',
                        'css_class' => '',
                        'sort_order' => 2,
                        'is_active' => true
                    ],
                    [
                        'title' => 'Cuisines',
                        'url' => '/cuisines',
                        'target' => '_self',
                        'icon' => 'fas fa-utensils',
                        'css_class' => '',
                        'sort_order' => 3,
                        'is_active' => true
                    ]
                ]
            ],
            [
                'title' => 'Account',
                'url' => '#',
                'target' => '_self',
                'icon' => 'fas fa-user-circle',
                'css_class' => 'sidebar-section',
                'sort_order' => 2,
                'is_active' => true,
                'children' => [
                    [
                        'title' => 'User Login',
                        'url' => '/user/login',
                        'target' => '_self',
                        'icon' => 'fas fa-sign-in-alt',
                        'css_class' => '',
                        'sort_order' => 1,
                        'is_active' => true
                    ],
                    [
                        'title' => 'Restaurant Login',
                        'url' => '/restaurant/login',
                        'target' => '_self',
                        'icon' => 'fas fa-store',
                        'css_class' => '',
                        'sort_order' => 2,
                        'is_active' => true
                    ],
                    [
                        'title' => 'Apply for Restaurant',
                        'url' => '/apply-restaurant',
                        'target' => '_self',
                        'icon' => 'fas fa-plus-circle',
                        'css_class' => '',
                        'sort_order' => 3,
                        'is_active' => true
                    ]
                ]
            ]
        ];

        // Create sidebar menu items
        foreach ($sidebarMenuItems as $itemData) {
            $children = $itemData['children'] ?? [];
            unset($itemData['children']);

            $menuItem = MenuItem::create([
                'menu_id' => $sidebarMenu->id,
                'parent_id' => null,
                'title' => $itemData['title'],
                'url' => $itemData['url'],
                'target' => $itemData['target'],
                'icon' => $itemData['icon'],
                'css_class' => $itemData['css_class'],
                'sort_order' => $itemData['sort_order'],
                'is_active' => $itemData['is_active']
            ]);

            // Create translations for parent item
            $languages = Language::all();
            foreach ($languages as $language) {
                MenuItemTranslation::create([
                    'menu_item_id' => $menuItem->id,
                    'locale' => $language->lang_code,
                    'title' => $itemData['title']
                ]);
            }

            // Create children items
            foreach ($children as $childData) {
                $childMenuItem = MenuItem::create([
                    'menu_id' => $sidebarMenu->id,
                    'parent_id' => $menuItem->id,
                    'title' => $childData['title'],
                    'url' => $childData['url'],
                    'target' => $childData['target'],
                    'icon' => $childData['icon'],
                    'css_class' => $childData['css_class'],
                    'sort_order' => $childData['sort_order'],
                    'is_active' => $childData['is_active']
                ]);

                // Create translations for child item
                foreach ($languages as $language) {
                    MenuItemTranslation::create([
                        'menu_item_id' => $childMenuItem->id,
                        'locale' => $language->lang_code,
                        'title' => $childData['title']
                    ]);
                }
            }
        }
    }
}
