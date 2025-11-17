<?php

namespace Modules\GlobalSetting\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\GlobalSetting\App\Models\PwaIconSetting;

class PwaIconSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultIcons = [
            ['icon_size' => '72x72', 'icon_path' => 'uploads/pwa-icons/icon-72x72.png', 'icon_type' => 'image/png', 'purpose' => 'any maskable'],
            ['icon_size' => '96x96', 'icon_path' => 'uploads/pwa-icons/icon-96x96.png', 'icon_type' => 'image/png', 'purpose' => 'any maskable'],
            ['icon_size' => '128x128', 'icon_path' => 'uploads/pwa-icons/icon-128x128.png', 'icon_type' => 'image/png', 'purpose' => 'any maskable'],
            ['icon_size' => '144x144', 'icon_path' => 'uploads/pwa-icons/icon-144x144.png', 'icon_type' => 'image/png', 'purpose' => 'any maskable'],
            ['icon_size' => '152x152', 'icon_path' => 'uploads/pwa-icons/icon-152x152.png', 'icon_type' => 'image/png', 'purpose' => 'any maskable'],
            ['icon_size' => '192x192', 'icon_path' => 'uploads/pwa-icons/icon-192x192.png', 'icon_type' => 'image/png', 'purpose' => 'any maskable'],
            ['icon_size' => '384x384', 'icon_path' => 'uploads/pwa-icons/icon-384x384.png', 'icon_type' => 'image/png', 'purpose' => 'any maskable'],
            ['icon_size' => '512x512', 'icon_path' => 'uploads/pwa-icons/icon-512x512.png', 'icon_type' => 'image/png', 'purpose' => 'any maskable'],
        ];

        foreach ($defaultIcons as $icon) {
            PwaIconSetting::updateOrCreate(
                ['icon_size' => $icon['icon_size']],
                $icon
            );
        }
    }
}
