<?php

// use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\WishlistController;

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


Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['admin:admin']
    ],
    function () {
        Route::get('/login', [AdminController::class, 'loginForm']);
        Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
    }
);

// Admin Routes

Route::middleware(['auth:admin'])->group(function(){


Route::middleware([ 'auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware(['auth:admin']);
});

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');

});

// User Routes


Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard', compact('user'));
    })->name('dashboard');
});


Route::get('/', [IndexController::class, 'index']);

Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');

Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');

Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');

Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('user.change.password');

Route::post('/user/change/password', [IndexController::class, 'UserUpdateChangePassword'])->name('user.update.change.password');



// Admin Brand All Routes

Route::prefix('brand')->group(function(){
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');

});


// Admin Category All Routes

Route::prefix('category')->group(function(){
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

// Admin SubCategory All Routes

    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
    Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

    
// Admin Sub-SubCategory All Routes

Route::get('/sub/sub/view', [SubSubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
Route::get('/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'GetSubCategory']);
Route::post('/sub/sub/store', [SubSubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
Route::get('/sub/sub/edit/{id}', [SubSubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
Route::post('/sub/sub/update', [SubSubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
Route::get('/sub/sub/delete/{id}', [SubSubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');

});

    
// Admin Products All Routes

Route::prefix('product')->group(function(){
    Route::get('/subsubcategory/ajax/{subcategory_id}', [ProductController::class, 'GetSubSubCategory']);
    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');
    Route::post('/store', [ProductController::class, 'ProductStore'])->name('product-store');
    Route::get('/menage', [ProductController::class, 'MenageProduct'])->name('menage-product');
    Route::get('/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product-edit');
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product-delete');
    Route::post('/update', [ProductController::class, 'ProductUpdate'])->name('product-update');
    Route::post('images/update', [ProductController::class, 'MultiImagesUpdate'])->name('product-update-images');
    Route::post('thumbnail/update', [ProductController::class, 'ThumbnailUpdate'])->name('product-update-thumbnail');
    Route::get('images/delete/{id}', [ProductController::class, 'MultiImagesDelete'])->name('product-multiimg-delete');
    Route::get('/inactive/{id}', [ProductController::class, 'InactiveProduct'])->name('product-inactive');
    Route::get('/active/{id}', [ProductController::class, 'ActiveProduct'])->name('product-active');
    Route::get('/details/{id}', [ProductController::class, 'ProductDetails'])->name('product-details');

});


// Admin Slider All Routes

Route::prefix('slider')->group(function(){
    Route::get('/view', [SliderController::class, 'SliderView'])->name('menage-slider');
    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider-store');
    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider-edit');
    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider-delete');
    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider-update');
    Route::get('/inactive/{id}', [SliderController::class, 'InactiveSlider'])->name('slider-inactive');
    Route::get('/active/{id}', [SliderController::class, 'ActiveSlider'])->name('slider-active');

});

// Admin Frontend All Routes

// switch between language
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
Route::get('/language/arabic', [LanguageController::class, 'Arabic'])->name('arabic.language');

// product details View
Route::get('product/details/{id}/{product_slug}', [IndexController::class, 'ProductDetails']);
// Tag Wise Product View
Route::get('product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);
// SubCategory Wise Product View
Route::get('subcategory/product/{subcat_id}/{subcategory_slug}', [IndexController::class, 'SubCategoryWiseProduct']);
// Sub-SubCategory Wise Product View
Route::get('subsubcategory/product/{subsubcat_id}/{subcategory_slug}/{subsubcategory_slug}', [IndexController::class, 'SubSubCategoryWiseProduct']);
// Product View Modal
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
// Add To Cart
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
// Mini Cart View
Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);
// Remove From Mini Cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// User Frontend All Routes


Route::group(['prefix'=>'user','middleware'=>['user','auth'], 'namespace'=>'User'],function(){
    
    // add to wishlist
    Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishList']);
    // wishlist view 
    Route::get('/wishlist', [WishlistController::class, 'WishlistView'])->name('wishlist');
    // display product from wishlist
    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
    // remove product from wishlist
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'wishlistRemove']);
    // stripe order
    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');
    // cash order
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
    // my orders
    Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');
    // order details
    Route::get('/order-details/{order_id}', [AllUserController::class, 'OrdersDetails']);
    // invoice download
    Route::get('/invoice-download/{order_id}', [AllUserController::class, 'InvoiceDownload']);


});


// cart view 
Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');
Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);
Route::get('/user/cart-remove/{rowId}', [CartPageController::class, 'RemoveCart']);
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'cartIncrement']);
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'cartDecrement']);





// Admin Coupon All Routes

Route::prefix('coupon')->group(function(){
    Route::get('/view', [CouponController::class, 'CouponView'])->name('menage-coupon');
    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
    Route::post('/update', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
    Route::get('/inactive/{id}', [CouponController::class, 'InactiveCoupon'])->name('coupon-inactive');
    Route::get('/active/{id}', [CouponController::class, 'ActiveCoupon'])->name('coupon-active');

});


// Admin Division All Routes

Route::prefix('shipping')->group(function(){
    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('menage-division');
    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');
    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');
    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');
    Route::post('/division/update', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');
    Route::get('/division/inactive/{id}', [ShippingAreaController::class, 'InactiveDivision'])->name('division-inactive');
    Route::get('/division/active/{id}', [ShippingAreaController::class, 'ActiveDivision'])->name('division-active');


// Admin District All Routes

    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('menage-district');
    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');
    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');
    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');
    Route::post('/district/update', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');


// Admin State All Routes

    Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('menage-state');
    Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');
    Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');
    Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');
    Route::post('/state/update', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');
    Route::get('/district/ajax/{division_id}', [ShippingAreaController::class, 'GetDistrict']);

});


// Frontend Coupon Apply All Routes

Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

// Frontend Checkout  All Routes

Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
Route::get('/district/ajax/{division_id}', [CheckoutController::class, 'GetDistrict']);
Route::get('/state/ajax/{district_id}', [CheckoutController::class, 'GetState']);
Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');


// Admin Orders All Routes

Route::prefix('orders')->group(function(){
    Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending-orders');
    Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');
    Route::get('/proccessing/orders', [OrderController::class, 'ProccessingOrders'])->name('proccessing-orders');
    Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');
    Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');
    Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');
    Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');

    Route::get('/pending/order/details/{order_id}', [OrderController::class, 'PendingOrderDetails'])->name('pending.order.details');

    // change Order Status

    Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending.confirm');
    Route::get('/confirm/proccessing/{order_id}', [OrderController::class, 'ConfirmToProccessing'])->name('confirm.proccessing');
    Route::get('/proccessing/picked/{order_id}', [OrderController::class, 'ProccessingToPicked'])->name('proccessing.picked');
    Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');
    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');

    Route::get('/invoice/download/{order_id}', [OrderController::class, 'InvoiceDownload'])->name('invoice.download');

});






















// Route::get('/sign-in', [IndexController::class, 'signin']);







// Route::middleware(['auth:sanctum,web','verified'])->get('/dashboard',function() {
//     return view('dashboard');
// })->name('dashboard');


// Route::middleware(['auth:sanctum,admin','verified'])->get('/admin/dashboard',function() {
//     return view('dashboard');
// })->name('dashboard');
