<?php

use App\Http\Controllers\{AboutController, AddressController, CategoryController, ColorController, CouponController, FrontendController, HomeController, OrderController, OrderItemController, PopController, ProductController, ProfileController, ReviewController, SizeController, SliderImageController, SupporterController, TestimonialController, VariantController, WishlistController};
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
Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->middleware(['auth', 'verified', 'role:admin'])->name('home.admin');
Route::get('/moderator/dashboard', [HomeController::class, 'moderatorDashboard'])->middleware(['auth', 'verified', 'role:moderator'])->name('home.moderator');



/*
|--------------------------------------------------------------------------
|                          Category Controller
|--------------------------------------------------------------------------
*/
Route::controller(CategoryController::class)->prefix('category')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('category.view');
    Route::get('/create', 'create')->name('category.create');
    Route::post('/store', 'store')->name('category.store');
    Route::get('/edit/{slug}', 'edit')->name('category.edit');
    Route::put('/update/{slug}', 'update')->name('category.update');
    Route::delete('/destroy/{slug}', 'destroy')->name('category.destroy');
});