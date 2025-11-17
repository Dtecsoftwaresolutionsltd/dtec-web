<?php

namespace Modules\Menu\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Entities\MenuItem;
use Modules\Menu\Entities\MenuTranslation;
use Modules\Menu\Entities\MenuItemTranslation;

class MenuDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Create default header menu
        $headerMenu = Menu::create([
            'name' => 'Header Menu',
            'location' => 'header',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        // Create translations for header menu
        MenuTranslation::create([
            'menu_id' => $headerMenu->id,
            'locale' => 'en',
            'name' => 'Header Menu',
        ]);

        MenuTranslation::create([
            'menu_id' => $headerMenu->id,
            'locale' => 'ar',
            'name' => 'قائمة الرأس',
        ]);

        MenuTranslation::create([
            'menu_id' => $headerMenu->id,
            'locale' => 'hi',
            'name' => 'हेडर मेनू',
        ]);

        // Create default menu items
        $menuItems = [
            [
                'title' => 'Home',
                'url' => '/',
                'target' => '_self',
                'icon' => 'fas fa-home',
                'sort_order' => 1,
                'translations' => [
                    ['locale' => 'en', 'title' => 'Home'],
                    ['locale' => 'ar', 'title' => 'الرئيسية'],
                    ['locale' => 'hi', 'title' => 'होम'],
                ]
            ],
            [
                'title' => 'About Us',
                'url' => '/about-us',
                'target' => '_self',
                'icon' => 'fas fa-info-circle',
                'sort_order' => 2,
                'translations' => [
                    ['locale' => 'en', 'title' => 'About Us'],
                    ['locale' => 'ar', 'title' => 'من نحن'],
                    ['locale' => 'hi', 'title' => 'हमारे बारे में'],
                ]
            ],
            [
                'title' => 'Listings',
                'url' => '/listings',
                'target' => '_self',
                'icon' => 'fas fa-list',
                'sort_order' => 3,
                'translations' => [
                    ['locale' => 'en', 'title' => 'Listings'],
                    ['locale' => 'ar', 'title' => 'القوائم'],
                    ['locale' => 'hi', 'title' => 'सूची'],
                ]
            ],
            [
                'title' => 'Dealers',
                'url' => '/dealers',
                'target' => '_self',
                'icon' => 'fas fa-users',
                'sort_order' => 4,
                'translations' => [
                    ['locale' => 'en', 'title' => 'Dealers'],
                    ['locale' => 'ar', 'title' => 'التجار'],
                    ['locale' => 'hi', 'title' => 'डीलर्स'],
                ]
            ],
            [
                'title' => 'Blogs',
                'url' => '/blogs',
                'target' => '_self',
                'icon' => 'fas fa-blog',
                'sort_order' => 5,
                'translations' => [
                    ['locale' => 'en', 'title' => 'Blogs'],
                    ['locale' => 'ar', 'title' => 'المدونات'],
                    ['locale' => 'hi', 'title' => 'ब्लॉग'],
                ]
            ],
            [
                'title' => 'Pages',
                'url' => '#',
                'target' => '_self',
                'icon' => 'fas fa-file',
                'sort_order' => 6,
                'translations' => [
                    ['locale' => 'en', 'title' => 'Pages'],
                    ['locale' => 'ar', 'title' => 'الصفحات'],
                    ['locale' => 'hi', 'title' => 'पेज'],
                ]
            ],
            [
                'title' => 'FAQ',
                'url' => '/faq',
                'target' => '_self',
                'icon' => 'fas fa-question-circle',
                'sort_order' => 7,
                'translations' => [
                    ['locale' => 'en', 'title' => 'FAQ'],
                    ['locale' => 'ar', 'title' => 'الأسئلة الشائعة'],
                    ['locale' => 'hi', 'title' => 'सामान्य प्रश्न'],
                ]
            ],
            [
                'title' => 'Contact',
                'url' => '/contact-us',
                'target' => '_self',
                'icon' => 'fas fa-envelope',
                'sort_order' => 8,
                'translations' => [
                    ['locale' => 'en', 'title' => 'Contact'],
                    ['locale' => 'ar', 'title' => 'اتصل بنا'],
                    ['locale' => 'hi', 'title' => 'संपर्क'],
                ]
            ],
        ];

        foreach ($menuItems as $itemData) {
            $translations = $itemData['translations'];
            unset($itemData['translations']);
            
            $menuItem = MenuItem::create(array_merge($itemData, [
                'menu_id' => $headerMenu->id,
                'is_active' => true,
            ]));

            // Create translations for menu item
            foreach ($translations as $translation) {
                MenuItemTranslation::create([
                    'menu_item_id' => $menuItem->id,
                    'locale' => $translation['locale'],
                    'title' => $translation['title'],
                ]);
            }
        }

        // Create submenu items for Pages
        $pagesMenuItem = MenuItem::where('title', 'Pages')->first();
        if ($pagesMenuItem) {
            $subItems = [
                [
                    'title' => 'Pricing Plan',
                    'url' => '/pricing-plan',
                    'target' => '_self',
                    'icon' => 'fas fa-dollar-sign',
                    'sort_order' => 1,
                    'parent_id' => $pagesMenuItem->id,
                    'translations' => [
                        ['locale' => 'en', 'title' => 'Pricing Plan'],
                        ['locale' => 'ar', 'title' => 'خطة التسعير'],
                        ['locale' => 'hi', 'title' => 'मूल्य निर्धारण योजना'],
                    ]
                ],
                [
                    'title' => 'Terms and Conditions',
                    'url' => '/terms-conditions',
                    'target' => '_self',
                    'icon' => 'fas fa-file-contract',
                    'sort_order' => 2,
                    'parent_id' => $pagesMenuItem->id,
                    'translations' => [
                        ['locale' => 'en', 'title' => 'Terms and Conditions'],
                        ['locale' => 'ar', 'title' => 'الشروط والأحكام'],
                        ['locale' => 'hi', 'title' => 'नियम और शर्तें'],
                    ]
                ],
                [
                    'title' => 'Privacy Policy',
                    'url' => '/privacy-policy',
                    'target' => '_self',
                    'icon' => 'fas fa-shield-alt',
                    'sort_order' => 3,
                    'parent_id' => $pagesMenuItem->id,
                    'translations' => [
                        ['locale' => 'en', 'title' => 'Privacy Policy'],
                        ['locale' => 'ar', 'title' => 'سياسة الخصوصية'],
                        ['locale' => 'hi', 'title' => 'गोपनीयता नीति'],
                    ]
                ],
            ];

            foreach ($subItems as $itemData) {
                $translations = $itemData['translations'];
                unset($itemData['translations']);
                
                $menuItem = MenuItem::create(array_merge($itemData, [
                    'menu_id' => $headerMenu->id,
                    'is_active' => true,
                ]));

                // Create translations for menu item
                foreach ($translations as $translation) {
                    MenuItemTranslation::create([
                        'menu_item_id' => $menuItem->id,
                        'locale' => $translation['locale'],
                        'title' => $translation['title'],
                    ]);
                }
            }
        }
    }
}
