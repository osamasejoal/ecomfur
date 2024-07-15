<?php

use App\Http\Controllers\{AboutController, AddressController, CategoryController, ColorController, CouponController, FrontendController, HomeController, OrderController, OrderItemController, ProductController, ProfileController, ReviewController, SizeController, SliderImageController, SupporterController, TestimonialController, VariantController, WishlistController};
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



/*
|--------------------------------------------------------------------------
|                          Frontend Controller
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontendController::class, 'index'])->name('frontpage');



/*
|--------------------------------------------------------------------------
|                          Home Controller
|--------------------------------------------------------------------------
*/
Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->middleware(['auth', 'verified', 'role:admin'])->name('admin');
Route::get('/moderator/dashboard', [HomeController::class, 'moderatorDashboard'])->middleware(['auth', 'verified', 'role:moderator'])->name('moderator');



/*
|--------------------------------------------------------------------------
|                          Category Controller
|--------------------------------------------------------------------------
*/
Route::controller(CategoryController::class)->prefix('category')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('category.view');
    Route::post('/create', 'create')->name('category.create');
    Route::put('/update/{id}', 'update')->name('category.update');
    Route::delete('/delete/{id}', 'delete')->name('category.delete');
});