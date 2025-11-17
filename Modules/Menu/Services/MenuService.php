<?php

namespace Modules\Menu\Services;

use Modules\Menu\Entities\Menu;
use Modules\Menu\Entities\MenuItem;
use Illuminate\Support\Facades\Cache;

class MenuService
{
    /**
     * Get menu by location with caching
     */
    public function getMenuByLocation(string $location): ?Menu
    {
        $cacheKey = "menu_{$location}_" . app()->getLocale();
        
        return Cache::remember($cacheKey, 3600, function () use ($location) {
            return Menu::active()
                ->byLocation($location)
                ->with(['menuItems.children', 'menuItems.translations'])
                ->orderBy('sort_order')
                ->first();
        });
    }

    /**
     * Get all menus by location
     */
    public function getMenusByLocation(string $location): \Illuminate\Database\Eloquent\Collection
    {
        $cacheKey = "menus_{$location}_" . app()->getLocale();
        
        return Cache::remember($cacheKey, 3600, function () use ($location) {
            return Menu::active()
                ->byLocation($location)
                ->with(['menuItems.children', 'menuItems.translations'])
                ->orderBy('sort_order')
                ->get();
        });
    }

    /**
     * Render menu HTML
     */
    public function renderMenu(string $location, array $options = []): string
    {
        $menu = $this->getMenuByLocation($location);
        
        if (!$menu) {
            return '';
        }

        $defaultOptions = [
            'ul_class' => 'nav-links',
            'li_class' => '',
            'a_class' => '',
            'submenu_class' => 'd-menu',
            'active_class' => 'active',
            'current_url' => request()->url(),
        ];

        $options = array_merge($defaultOptions, $options);

        return $this->buildMenuHtml($menu->menuItems, $options);
    }

    /**
     * Build menu HTML recursively
     */
    private function buildMenuHtml($menuItems, array $options, int $level = 0): string
    {
        if ($menuItems->isEmpty()) {
            return '';
        }

        $html = "<ul class=\"{$options['ul_class']}";
        if ($level > 0) {
            $html .= " {$options['submenu_class']}";
        }
        $html .= "\">";

        foreach ($menuItems as $item) {
            if (!$item->is_active) {
                continue;
            }

            $isActive = $this->isCurrentUrl($item->url, $options['current_url']);
            $liClass = $options['li_class'];
            $aClass = $options['a_class'];

            if ($isActive) {
                $liClass .= " {$options['active_class']}";
                $aClass .= " {$options['active_class']}";
            }

            // Add dropdown class if has children
            if ($item->hasChildren()) {
                $liClass .= " dropdown";
            }

            $html .= "<li class=\"{$liClass}\">";
            
            // Build link
            $target = $item->target ? " target=\"{$item->target}\"" : '';
            $icon = $item->icon ? "<i class=\"{$item->icon}\"></i>" : '';
            $title = $item->translated_title;
            
            $html .= "<a href=\"{$item->url}\" class=\"{$aClass}\"{$target}>";
            $html .= $icon . $title;
            
            // Add dropdown arrow if has children
            if ($item->hasChildren()) {
                $html .= "<span><i class=\"fa-solid fa-angle-down\"></i></span>";
            }
            
            $html .= "</a>";

            // Render children
            if ($item->hasChildren()) {
                $html .= $this->buildMenuHtml($item->children, $options, $level + 1);
            }

            $html .= "</li>";
        }

        $html .= "</ul>";

        return $html;
    }

    /**
     * Check if current language is RTL
     */
    private function isRTL(): bool
    {
        return session('lang_dir') === 'right_to_left' || 
               app()->getLocale() === 'ar' ||
               app()->getLocale() === 'he' ||
               app()->getLocale() === 'fa';
    }

    /**
     * Check if URL is current
     */
    private function isCurrentUrl(?string $menuUrl, string $currentUrl): bool
    {
        if (!$menuUrl) {
            return false;
        }

        // Exact match
        if ($menuUrl === $currentUrl) {
            return true;
        }

        // Check if current URL starts with menu URL (for parent pages)
        if (str_starts_with($currentUrl, $menuUrl) && $menuUrl !== '/') {
            return true;
        }

        return false;
    }

    /**
     * Clear menu cache
     */
    public function clearCache(): void
    {
        $locations = ['header', 'footer', 'sidebar'];
        $locales = config('app.available_locales', ['en']);

        foreach ($locations as $location) {
            foreach ($locales as $locale) {
                Cache::forget("menu_{$location}_{$locale}");
                Cache::forget("menus_{$location}_{$locale}");
            }
        }
    }

    /**
     * Get menu items for admin drag & drop
     */
    public function getMenuItemsForAdmin(Menu $menu): array
    {
        $items = $menu->allMenuItems()->with(['children', 'translations'])->get();
        
        return $this->buildMenuTree($items);
    }

    /**
     * Build menu tree structure
     */
    private function buildMenuTree($items, $parentId = null): array
    {
        $tree = [];
        
        foreach ($items as $item) {
            if ($item->parent_id == $parentId) {
                $node = [
                    'id' => $item->id,
                    'title' => $item->translated_title,
                    'url' => $item->url,
                    'target' => $item->target,
                    'icon' => $item->icon,
                    'css_class' => $item->css_class,
                    'sort_order' => $item->sort_order,
                    'is_active' => $item->is_active,
                    'children' => $this->buildMenuTree($items, $item->id)
                ];
                
                $tree[] = $node;
            }
        }
        
        return $tree;
    }
} 