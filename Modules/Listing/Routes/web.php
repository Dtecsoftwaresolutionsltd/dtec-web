<?php

use Modules\Listing\Http\Controllers\ListingController;


Route::group(['as'=> 'admin.', 'prefix' => 'admin/listing', 'middleware' => ['auth:admin']],function (){

    Route::resource('listings', ListingController::class);

    Route::get('/get-subcategories/{categoryId}', [ListingController::class, 'getSubcategories'])->name('get-subcategories');

    Route::get('awaiting-listings', [ListingController::class, 'awaiting_listings'])->name('awaiting-listings');
    Route::get('featured-listings', [ListingController::class, 'featured_listings'])->name('featured-listings');

    Route::get('listings-gallery/{id}', [ListingController::class, 'listing_gallery'])->name('listings-gallery');
    Route::post('upload-gallery/{id}', [ListingController::class, 'upload_listing_gallery'])->name('upload-gallery');
    Route::delete('delete-gallery/{id}', [ListingController::class, 'delete_listing_gallery'])->name('delete-gallery');

    Route::put('listings-approval/{id}', [ListingController::class, 'listings_approval'])->name('listings-approval');
    Route::put('listings-featured/{id}', [ListingController::class, 'listings_featured'])->name('listings-featured');
    Route::put('listings-featured-removed/{id}', [ListingController::class, 'listings_featured_removed'])->name('listings-featured-removed');

    Route::get('review-list', [ListingController::class, 'review_list'])->name('review-list');
    Route::get('review-detail/{id}', [ListingController::class, 'review_detail'])->name('review-detail');
    Route::delete('review-delete/{id}', [ListingController::class, 'review_delete'])->name('review-delete');
    Route::put('review-approval/{id}', [ListingController::class, 'review_approval'])->name('review-approval');
});


