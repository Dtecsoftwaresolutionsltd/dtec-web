<?php

namespace Modules\Menu\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Services\MenuService;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Menu';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'menu';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

        // Register Blade directives
        $this->registerBladeDirectives();
        
        // Register commands
        $this->registerCommands();

        // Register menu components
        Blade::component('menu::components.menu', 'menu');
        Blade::component('menu::components.mobile-menu', 'mobile-menu');
        Blade::component('menu::components.menu-item', 'menu-item');

        // Register menu helper function
        if (!function_exists('render_menu')) {
            function render_menu($menuId, $class = 'nav-links') {
                $menu = Menu::find($menuId);
                if (!$menu) return '';
                
                return view('menu::components.menu', compact('menu', 'class'))->render();
            }
        }

        if (!function_exists('render_mobile_menu')) {
            function render_mobile_menu($menuId) {
                $menu = Menu::find($menuId);
                if (!$menu) return '';
                
                return view('menu::components.mobile-menu', compact('menu'))->render();
            }
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        // Register MenuService as singleton
        $this->app->singleton(MenuService::class, function ($app) {
            return new MenuService();
        });
    }

    /**
     * Register Blade directives
     */
    private function registerBladeDirectives()
    {
        Blade::directive('menu', function ($expression) {
            return "<?php echo app('" . MenuService::class . "')->renderMenu($expression); ?>";
        });

        Blade::directive('menuItems', function ($expression) {
            return "<?php echo app('" . MenuService::class . "')->getMenuByLocation($expression); ?>";
        });
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Register commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        $this->commands([
            \Modules\Menu\Console\Commands\ClearMenuCache::class,
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
