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



/*
|--------------------------------------------------------------------------
|                          About Controller
|--------------------------------------------------------------------------
*/
Route::controller(AboutController::class)->prefix('about')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('about.view');
    Route::put('/update/{id}', 'update')->name('about.update');
});



/*
|--------------------------------------------------------------------------
|                          Testimonial Controller
|--------------------------------------------------------------------------
*/
Route::controller(TestimonialController::class)->prefix('testimonial')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('testimonial.view');
    Route::get('/create', 'create')->name('testimonial.create');
    Route::post('/store', 'store')->name('testimonial.store');
    Route::get('/edit/{id}', 'edit')->name('testimonial.edit');
    Route::put('/update/{id}', 'update')->name('testimonial.update');
    Route::delete('/destroy/{id}', 'destroy')->name('testimonial.destroy');
});



/*
|--------------------------------------------------------------------------
|                          Supporter Controller
|--------------------------------------------------------------------------
*/
Route::controller(SupporterController::class)->prefix('supporter')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('supporter.view');
    Route::get('/create', 'create')->name('supporter.create');
    Route::post('/store', 'store')->name('supporter.store');
    Route::get('/edit/{id}', 'edit')->name('supporter.edit');
    Route::put('/update/{id}', 'update')->name('supporter.update');
    Route::delete('/destroy/{id}', 'destroy')->name('supporter.destroy');
});