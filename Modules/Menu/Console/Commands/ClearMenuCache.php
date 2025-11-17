<?php

namespace Modules\Menu\Console\Commands;

use Illuminate\Console\Command;
use Modules\Menu\Services\MenuService;

class ClearMenuCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'menu:clear-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all menu cache';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $menuService = app(MenuService::class);
        $menuService->clearCache();

        $this->info('Menu cache cleared successfully!');

        return 0;
    }
} 