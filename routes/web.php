<?php

// use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\CatagoryController;
use App\Http\Controllers\Backend\SubCatagoryController;

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

Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');


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


// Admin Catagory All Routes

Route::prefix('catagory')->group(function(){
    Route::get('/view', [CatagoryController::class, 'CatagoryView'])->name('all.catagory');
    Route::post('/store', [CatagoryController::class, 'CatagoryStore'])->name('catagory.store');
    Route::get('/edit/{id}', [CatagoryController::class, 'CatagoryEdit'])->name('catagory.edit');
    Route::post('/update', [CatagoryController::class, 'CatagoryUpdate'])->name('catagory.update');
    Route::get('/delete/{id}', [CatagoryController::class, 'CatagoryDelete'])->name('catagory.delete');

// Admin SubCatagory All Routes

    Route::get('/sub/view', [SubCatagoryController::class, 'SubCatagoryView'])->name('all.subcatagory');
    Route::post('/sub/store', [SubCatagoryController::class, 'SubCatagoryStore'])->name('subcatagory.store');
    Route::get('/sub/edit/{id}', [SubCatagoryController::class, 'SubCatagoryEdit'])->name('subcatagory.edit');
    Route::post('/sub/update', [SubCatagoryController::class, 'SubCatagoryUpdate'])->name('subcatagory.update');
    Route::get('/sub/delete/{id}', [SubCatagoryController::class, 'SubCatagoryDelete'])->name('subcatagory.delete');

});


    

























// Route::get('/sign-in', [IndexController::class, 'signin']);







// Route::middleware(['auth:sanctum,web','verified'])->get('/dashboard',function() {
//     return view('dashboard');
// })->name('dashboard');


// Route::middleware(['auth:sanctum,admin','verified'])->get('/admin/dashboard',function() {
//     return view('dashboard');
// })->name('dashboard');
