<?php

use Illuminate\Support\Facades\Route;
use Modules\Menu\Http\Controllers\Admin\MenuController;
use Modules\Menu\Http\Controllers\Admin\MenuItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::group(['middleware' => ['auth:admin']], function () {
        /// Menu Management Routes
        Route::controller(MenuController::class)->group(function () {
            Route::get('menus', 'index')->name('menus.index');
            Route::get('menus/create', 'create')->name('menus.create');
            Route::post('menus', 'store')->name('menus.store');
            Route::get('menus/{menu}', 'show')->name('menus.show');
            Route::get('menus/{menu}/edit', 'edit')->name('menus.edit');
            Route::put('menus/{menu}', 'update')->name('menus.update');
            Route::delete('menus/{menu}', 'destroy')->name('menus.destroy');
            Route::patch('menus/{menu}/toggle-status', 'toggleStatus')->name('menus.toggle-status');
        });

        Route::controller(MenuItemController::class)->group(function () { 
            Route::get('menus/{menu}/menu-items', 'index')->name('menus.menu-items.index');
            Route::get('menus/{menu}/menu-items/create', 'create')->name('menus.menu-items.create');
            Route::post('menus/{menu}/menu-items', 'store')->name('menus.menu-items.store');
            Route::get('menu-items/{menuItem}', 'show')->name('menus.menu-items.show');
            Route::get('menu-item/edit', 'edit')->name('menus.menu-items.edit');
            Route::put('menu-items/{menuItem}', 'update')->name('menus.menu-items.update');
            Route::delete('menu-items/{menuItem}', 'destroy')->name('menus.menu-items.destroy');
            Route::patch('menu-items/{menuItem}/toggle-status', 'toggleStatus')->name('menus.menu-items.toggle-status');
            Route::post('menus/{menu}/menu-items/update-order', 'updateOrder')->name('menus.menu-items.update-order');
        });
    });
});
