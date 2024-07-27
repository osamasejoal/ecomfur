<?php

use App\Http\Controllers\{AboutController, AddressController, CategoryController, ColorController, CouponController, FrontendController, HomeController, OrderController, OrderItemController, PopController, ProductController, ProfileController, ReviewController, SizeController, SliderImageController, SupporterController, TestimonialController, VariantController, WishlistController, ServiceController, FrontImageController};
use App\Models\FrontImage;
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
Route::get('/wishlist', [FrontendController::class, 'wishlist'])->name('wishlist.view');
Route::get('/category/products/{id}', [FrontendController::class, 'category_product'])->name('category.products');
Route::get('/product/details/{id}', [FrontendController::class, 'product_details'])->name('product.details');



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
|                          Product Controller
|--------------------------------------------------------------------------
*/
Route::controller(ProductController::class)->prefix('product')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('product.view');
    Route::get('/create', 'create')->name('product.create');
    Route::post('/store', 'store')->name('product.store');
    Route::get('/details/{slug}', 'productDetails')->name('product.details');
    Route::get('/edit/{slug}', 'edit')->name('product.edit');
    Route::put('/update/{slug}', 'update')->name('product.update');
    Route::delete('/destroy/{slug}', 'destroy')->name('product.destroy');
});



/*
|--------------------------------------------------------------------------
|                          Variant Controller
|--------------------------------------------------------------------------
*/
Route::controller(VariantController::class)->prefix('variant')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('variant.view');
    Route::get('/create', 'create')->name('variant.create');
    Route::post('/store', 'store')->name('variant.store');
    Route::get('/edit/{id}', 'edit')->name('variant.edit');
    Route::put('/update/{id}', 'update')->name('variant.update');
    Route::delete('/destroy/{id}', 'destroy')->name('variant.destroy');
});



/*
|--------------------------------------------------------------------------
|                          Color Controller
|--------------------------------------------------------------------------
*/
Route::controller(ColorController::class)->prefix('color')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('color.view');
    Route::get('/create', 'create')->name('color.create');
    Route::post('/store', 'store')->name('color.store');
    Route::delete('/destroy/{id}', 'destroy')->name('color.destroy');
});



/*
|--------------------------------------------------------------------------
|                          Size Controller
|--------------------------------------------------------------------------
*/
Route::controller(SizeController::class)->prefix('size')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('size.view');
    Route::get('/create', 'create')->name('size.create');
    Route::post('/store', 'store')->name('size.store');
    Route::delete('/destroy/{id}', 'destroy')->name('size.destroy');
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



/*
|--------------------------------------------------------------------------
|                          Coupon Controller
|--------------------------------------------------------------------------
*/
Route::controller(CouponController::class)->prefix('coupon')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('coupon.view');
    Route::get('/create', 'create')->name('coupon.create');
    Route::post('/store', 'store')->name('coupon.store');
    Route::get('/edit/{id}', 'edit')->name('coupon.edit');
    Route::put('/update/{id}', 'update')->name('coupon.update');
    Route::delete('/destroy/{id}', 'destroy')->name('coupon.destroy');
});



/*
|--------------------------------------------------------------------------
|                          Review Controller
|--------------------------------------------------------------------------
*/
Route::controller(ReviewController::class)->prefix('review')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('review.view');
    Route::post('/store', 'store')->name('review.store');
    Route::put('/update/{id}', 'update')->name('review.update');
    Route::delete('/destroy/{id}', 'destroy')->name('review.destroy');
});



/*
|--------------------------------------------------------------------------
|                          Slider Image Controller
|--------------------------------------------------------------------------
*/
Route::controller(SliderImageController::class)->prefix('SliderImage')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('SliderImage.view');
    Route::get('/create', 'create')->name('SliderImage.create');
    Route::post('/store', 'store')->name('SliderImage.store');
    Route::get('/edit/{id}', 'edit')->name('SliderImage.edit');
    Route::put('/update/{id}', 'update')->name('SliderImage.update');
    Route::delete('/destroy/{id}', 'destroy')->name('SliderImage.destroy');
});



/*
|--------------------------------------------------------------------------
|                          Service Controller
|--------------------------------------------------------------------------
*/
Route::controller(ServiceController::class)->prefix('service')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('service.view');
    Route::get('/edit/{id}', 'edit')->name('service.edit');
    Route::put('/update/{id}', 'update')->name('service.update');
});



/*
|--------------------------------------------------------------------------
|                          Front Image Controller
|--------------------------------------------------------------------------
*/
Route::controller(FrontImageController::class)->prefix('front/image')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('front.image.view');
    Route::get('/edit/{id}', 'edit')->name('front.image.edit');
    Route::put('/update/{id}', 'update')->name('front.image.update');
});



/*
|--------------------------------------------------------------------------
|                          Wishlist Controller
|--------------------------------------------------------------------------
*/
Route::controller(WishlistController::class)->prefix('wishlist')->middleware(['auth'])->group(function() {
    Route::get('/store/{id}', 'store')->name('wishlist.store');
    Route::delete('/destroy/{id}', 'destroy')->name('wishlist.destroy');
});
