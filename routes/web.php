<?php

// use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\LanguageController;

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

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
Route::get('/language/arabic', [LanguageController::class, 'Arabic'])->name('arabic.language');

Route::get('product/details/{id}/{product_slug}', [IndexController::class, 'ProductDetails']);
Route::get('product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);
Route::get('subcategory/product/{subcat_id}/{subcategory_slug}', [IndexController::class, 'SubCategoryWiseProduct']);
Route::get('subsubcategory/product/{subsubcat_id}/{subcategory_slug}/{subsubcategory_slug}', [IndexController::class, 'SubSubCategoryWiseProduct']);






























// Route::get('/sign-in', [IndexController::class, 'signin']);







// Route::middleware(['auth:sanctum,web','verified'])->get('/dashboard',function() {
//     return view('dashboard');
// })->name('dashboard');


// Route::middleware(['auth:sanctum,admin','verified'])->get('/admin/dashboard',function() {
//     return view('dashboard');
// })->name('dashboard');
