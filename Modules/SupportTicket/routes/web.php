<?php

use Illuminate\Support\Facades\Route;
use Modules\SupportTicket\App\Http\Controllers\Support\User\UserSupportTicketController;
use Modules\SupportTicket\App\Http\Controllers\Support\Admin\AdminSupportTicketController;

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





Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware' => ['auth:web', 'HtmlSpecialchars', 'MaintenanceMode']], function () {
    Route::resource('ticket-support', UserSupportTicketController::class);
    Route::post('ticket-support-message/{id}', [UserSupportTicketController::class, 'support_ticket_message'])->name('ticket-support-message');
});



Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin', 'HtmlSpecialchars', 'MaintenanceMode']], function () {
    Route::get('support-tickets', [AdminSupportTicketController::class, 'index'])->name('support-tickets');
    Route::get('support-ticket/{id}', [AdminSupportTicketController::class, 'show'])->name('support-ticket');
    Route::post('support-ticket-message/{id}', [AdminSupportTicketController::class, 'support_ticket_message'])->name('support-ticket-message');
    Route::delete('support-ticket-delete/{id}', [AdminSupportTicketController::class, 'destroy'])->name('support-ticket-delete');
    Route::put('support-ticket-close/{id}', [AdminSupportTicketController::class, 'close'])->name('support-ticket-close');
});
