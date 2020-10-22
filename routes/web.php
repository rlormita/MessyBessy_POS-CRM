<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CashierRoleController;
use App\Http\Controllers\CashierController;

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
Route::get('/dashboard/index', function () {
    return view('dashboard.main');
});

Auth::routes(['verify' => true]);

Route::get('/transactions', function () {
    return view('shop.app');
});

Route::get('employee/cashier', [App\Http\Controllers\CashierController::class, 'index'])->name('cashier.index');
Route::get('employee/cashier/create', [App\Http\Controllers\CashierController::class, 'create'])->name('cashier.create');
Route::post('employee/cashier/store', [App\Http\Controllers\CashierController::class, 'store'])->name('cashier.store');

Route::get('employee/cashier/role', [App\Http\Controllers\CashierRoleController::class, 'view'])->name('cashier_role.view');
Route::get('employee/cashier/role/create',  [App\Http\Controllers\CashierRoleController::class, 'create'])->name('cashier_role.create');
Route::get('employee/cashier/role/edit',  [App\Http\Controllers\CashierRoleController::class, 'edit'])->name('cashier_role.edit');
Route::post('employee/cashier/role/store',  [App\Http\Controllers\CashierRoleController::class, 'store'])->name('cashier_role.store');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/dashboard/products', ProductController::class);
    Route::resource('/dashboard/categories', ProductCategoryController::class);
    Route::resource('/dashboard/employees', EmployeeController::class);
    Route::resource('cashier_role', CashierRoleController::class);
    // Route::resource('employee', [App\Http\Controllers\EmployeeController::class]);
    Route::resource('/dashboard/stocks', StockController::class);
    Route::get('/dashboard/stocks/{id}', 'StockController@show');
    Route::resource('branches', BranchController::class);
    // Route::view('/transactions','transactions/transaction');

    // Route::get('/transactions','App\Http\Controllers\ProductController@productList');

	Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
	Route::get('/profile/edit',  [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
	Route::post('/profile/upload',  [App\Http\Controllers\ProfileController::class, 'upload'])->name('profile.upload');
	Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
	Route::match(['put', 'patch'], 'profile/password', [App\Http\Controllers\ProfileController::class, 'password'])->name('profile.password');

    Route::get('/employee/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employee.create');
    Route::post('employee/cashier/role/update', [App\Http\Controllers\CashierRoleController::class, 'update'])->name('cashier_role.update');

    Route::get('employee/cashier/role/edit',  [App\Http\Controllers\CashierRoleController::class, 'edit'])->name('cashier_role.edit');
    Route::post('employee/cashier/role/store',  [App\Http\Controllers\CashierRoleController::class, 'store'])->name('cashier_role.store');



});
