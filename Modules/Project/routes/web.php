<?php

use Illuminate\Support\Facades\Route;
use Modules\Project\App\Http\Controllers\ProjectController;

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

Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']],function (){
    // Project Route
    Route::resource('project', ProjectController::class)->names('project');
    // Project Gallery Route
    Route::get('project-gallery/{id}', [ProjectController::class, 'listing_project'])->name('project-gallery');
    Route::post('upload-gallery/{id}', [ProjectController::class, 'upload_listing_project'])->name('upload-project');
    Route::delete('delete-project-gallery/{id}', [ProjectController::class, 'delete_listing_project'])->name('delete-project');
});
