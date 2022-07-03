<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// ================================ Index Route ==================================== //

Route::get('/', [IndexController::class, 'index']);
Route::post('/user/profile/update', [IndexController::class, 'updateUser'])->name('user.profile.update');

// =============================== Index Route Ends ==================================== //

Route::get('/user/profile', function () {
    return view('user.user_profile');
})->middleware(['auth'])->name('user.profile');

require __DIR__.'/auth.php';

// ============================= Admin Route ==================================== //

Route::middleware('admin')->group(function(){
    Route::get('admin/dashboard', [AdminController::class, 'displayDashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('admin/profile', [AdminProfileController::class, 'displayProfile'])->name('admin.profile');
    Route::get('admin/profile/edit/{id}', [AdminProfileController::class, 'editProfile']); 
    Route::post('admin/profile/update/{id}', [AdminProfileController::class, 'updateProfile']);
    Route::get('admin/profile/password/change', [AdminProfileController::class, 'changeProfilePassword'])->name('admin.password.change');
    Route::post('admin/profile/password/update', [AdminProfileController::class, 'updateProfilePassword'])->name('admin.password.update');

    Route::prefix('brand')->group(function(){
        Route::get('/all', [BrandController::class, 'allBrands'])->name('all.brands');
        Route::get('/add', [BrandController::class, 'addBrands'])->name('add.brands');
        Route::post('/store', [BrandController::class, 'storeBrands'])->name('store.brands');
        Route::get('/edit/{id}', [BrandController::class, 'editBrands']);
        Route::post('/update/{id}', [BrandController::class, 'updateBrands']);
        Route::get('/delete/{id}', [BrandController::class, 'deleteBrands']);
    
    });

    Route::prefix('category')->group(function(){
        Route::get('/all', [CategoryController::class, 'allCategories'])->name('all.categories');
        Route::get('/add', [CategoryController::class, 'addCategories'])->name('add.categories');
        Route::post('/store', [CategoryController::class, 'storeCategories'])->name('store.categories');
        Route::get('/edit/{id}', [CategoryController::class, 'editCategories']);
        Route::post('/update/{id}', [CategoryController::class, 'updateCategories']);
        Route::get('/delete/{id}', [CategoryController::class, 'deleteCategories']);
    
    });

    Route::prefix('subcategory')->group(function(){
        Route::get('/all', [SubCategoryController::class, 'allSubCategories'])->name('all.subcategories');
        Route::get('/add', [SubCategoryController::class, 'addSubCategories'])->name('add.subcategories');
        Route::post('/store', [SubCategoryController::class, 'storeSubCategories'])->name('store.subcategories');
        Route::get('/edit/{id}', [SubCategoryController::class, 'editSubCategories']);
        Route::post('/update/{id}', [SubCategoryController::class, 'updateSubCategories']);
        Route::get('/delete/{id}', [SubCategoryController::class, 'deleteSubCategories']);
    
    });
    
});
    Route::get('admin/login', [AdminController::class, 'login'])->middleware('guest:admin')->name('admin.login');
    Route::post('admin/login', [AdminController::class, 'loginvalidate'])->middleware('guest:admin')->name('admin.loginvalidate');

// =========================== Admin Route Ends ================================ //

// ================================ Brand Route ==================================== //
// Route::prefix('brand')->middleware('admin')->group(function(){
//     Route::get('/all', [BrandController::class, 'allBrands'])->name('all.brands');
//     Route::get('/add', [BrandController::class, 'addBrands'])->name('add.brands');
//     Route::post('/store', [BrandController::class, 'storeBrands'])->name('store.brands');
//     Route::get('/edit/{id}', [BrandController::class, 'editBrands']);
//     Route::post('/update/{id}', [BrandController::class, 'updateBrands']);
//     Route::get('/delete/{id}', [BrandController::class, 'deleteBrands']);

// });

// =============================== Brand Route Ends ==================================== //

