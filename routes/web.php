<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () {
    return view('auth.login');
});
/* Route::get('/transactions', function () {
    return view('transactions\transaction');
}); */
Route::get('/dashboard', function () {
    return view('dashboard.dashboard2');
});
Auth::routes(['verify' => true]);



Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('products', ProductController::class);
    Route::resource('categories', ProductCategoryController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('branches', BranchController::class);
    // Route::view('/transactions','transactions/transaction');
	Route::view('/transactions','shop.index');

	// Route::get('/transactions','App\Http\Controllers\ProductController@productList');

	Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
	Route::get('/profile/edit',  [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
	Route::post('/profile/upload',  [App\Http\Controllers\ProfileController::class, 'upload'])->name('profile.upload');
	Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
	Route::match(['put', 'patch'], 'profile/password', [App\Http\Controllers\ProfileController::class, 'password'])->name('profile.password');

	Route::get('/employee/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employee.create');
});
