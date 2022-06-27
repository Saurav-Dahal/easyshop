<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;

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
});
    Route::get('admin/login', [AdminController::class, 'login'])->middleware('guest:admin')->name('admin.login');
    Route::post('admin/login', [AdminController::class, 'loginvalidate'])->middleware('guest:admin')->name('admin.loginvalidate');

// =========================== Admin Route Ends ================================ //

// ================================ Index Route ==================================== //

Route::get('/', [IndexController::class, 'index']);
Route::post('/user/profile/update', [IndexController::class, 'updateUser'])->name('user.profile.update');

// =============================== Index Route Ends ==================================== //