<?php

use App\Http\Controllers\{AboutController, AddressController, CategoryController, CouponController, FrontendController, HomeController, OrderController, OrderItemController, ProductController, ProfileController, ReviewController, SliderImageController, SupporterController, TestimonialController, VariantController, WishlistController, ServiceController, FrontImageController, CartController, UserProfileController, CompanyInfoController, CompanySocialController};
use App\Models\Cart;
use App\Models\CompanyInfo;
use App\Models\CompanySocial;
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
Route::get('/wishlists', [FrontendController::class, 'wishlist'])->name('wishlist.view');
Route::get('/carts', [FrontendController::class, 'cart'])->name('cart.view');
Route::get('/category/products/{id}', [FrontendController::class, 'category_product'])->name('category.products');
Route::get('/product/details/{id}', [FrontendController::class, 'product_details'])->name('product.details');



/*
|--------------------------------------------------------------------------
|                          Home Controller
|--------------------------------------------------------------------------
*/
Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->middleware(['auth', 'verified', 'role:admin'])->name('home.admin');
// Route::get('/moderator/dashboard', [HomeController::class, 'moderatorDashboard'])->middleware(['auth', 'verified', 'role:moderator'])->name('home.moderator');



/*
|--------------------------------------------------------------------------
|                         User Profile Controller
|--------------------------------------------------------------------------
*/
Route::controller(UserProfileController::class)->prefix('user/profile')->middleware(['auth'])->group(function() {
    Route::get('/page', 'index')->name('user.profile');
    Route::put('/update/{id}', 'update')->name('user.profile.update');

    Route::get('/change/password', 'changePassword')->name('user.password.change');
    Route::put('/update/password', 'updatePassword')->name('user.password.update');
    
    Route::get('/orders', 'userOrders')->name('user.orders');
    Route::get('/order/details/{id}', 'orderDetails')->name('user.order.details');
});



/*
|--------------------------------------------------------------------------
|                         Address Controller
|--------------------------------------------------------------------------
*/
Route::controller(AddressController::class)->prefix('user/address')->middleware(['auth'])->group(function() {
    Route::get('/page', 'index')->name('user.address');
    Route::post('/store/{id}', 'store')->name('user.address.store');
    Route::delete('/destroy/{id}', 'destroy')->name('user.address.destroy');
});



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
    
    Route::post('/toggle/featured/{slug}', 'toggleFeatured')->name('category.toggleFeatured');
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
    Route::get('/edit/{slug}', 'edit')->name('product.edit');
    Route::put('/update/{id}', 'update')->name('product.update');
    Route::delete('/destroy/{slug}', 'destroy')->name('product.destroy');

    Route::get('/single/details/{slug}', 'productDetails')->name('single.productDetails');
    Route::post('/toggle/best/sale/{id}', 'toggleBestSale')->name('product.toggleBestSale');
    Route::post('/toggle/status/{id}', 'toggleStatus')->name('product.toggleStatus');
    Route::delete('/image/delete/{id}', 'deleteImage')->name('product.deleteImage');
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
|                          About Controller
|--------------------------------------------------------------------------
*/
Route::controller(AboutController::class)->prefix('about')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('about.view');
    Route::get('/edit/{id}', 'edit')->name('about.edit');
    Route::put('/update/{id}', 'update')->name('about.update');

    Route::delete('/image/delete', 'deleteImage')->name('about.deleteImage');
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

    Route::post('/toggle/status/{id}', 'toggleStatus')->name('coupon.toggleStatus');
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
|                          Company Info Controller
|--------------------------------------------------------------------------
*/
Route::controller(CompanyInfo::class)->prefix('company/info')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('com.info.view');
    Route::get('/edit/{id}', 'edit')->name('com.info.edit');
    Route::put('/update/{id}', 'update')->name('com.info.update');
});



/*
|--------------------------------------------------------------------------
|                          Company Social Controller
|--------------------------------------------------------------------------
*/
Route::controller(CompanySocial::class)->prefix('company/social')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/index', 'index')->name('com.social.view');
    Route::get('/edit/{id}', 'edit')->name('com.social.edit');
    Route::put('/update/{id}', 'update')->name('com.social.update');
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



/*
|--------------------------------------------------------------------------
|                          Cart Controller
|--------------------------------------------------------------------------
*/
Route::controller(CartController::class)->prefix('cart')->middleware(['auth'])->group(function() {
    Route::post('/store/{id}', 'store')->name('cart.store');
    Route::delete('/destroy/{id}', 'destroy')->name('cart.destroy');

    Route::post('/update', 'update')->name('cart.update');
    Route::post('/clear', 'clear_cart')->name('cart.clear');
    Route::post('/coupon', 'apply_coupon')->name('cart.coupon');
});
