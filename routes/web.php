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



use App\Http\Controllers\CashierHomeController;


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

/* Route::get('/transactions', function () {
    return view('transactions\transaction');
}); */

Auth::routes(['verify' => true]);

Route::get('/transactions', function () {

    return view('searchform');
});

Route::get('employee/cashier', [App\Http\Controllers\CashierController::class, 'index'])->name('cashier.index');
Route::get('employee/cashier/create', [App\Http\Controllers\CashierController::class, 'create'])->name('cashier.create');
Route::post('employee/cashier/store', [App\Http\Controllers\CashierController::class, 'store'])->name('cashier.store');

Route::get('employee/cashier/role', [App\Http\Controllers\CashierRoleController::class, 'view'])->name('cashier_role.view');
Route::get('employee/cashier/role/create',  [App\Http\Controllers\CashierRoleController::class, 'create'])->name('cashier_role.create');
Route::get('employee/cashier/role/edit',  [App\Http\Controllers\CashierRoleController::class, 'edit'])->name('cashier_role.edit');
Route::post('employee/cashier/role/store',  [App\Http\Controllers\CashierRoleController::class, 'store'])->name('cashier_role.store');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    return view('shop.app');
});

Route::prefix('employee')->group(function() {

    Route::get('/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employee.create');
    Route::get('/destroy', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employee.destroy');

    //Cashiers
    Route::prefix('/cashier')->group(function(){

        //Cashier management
        Route::get('/', [App\Http\Controllers\CashierController::class, 'view'])->name('cashier.view');
        Route::get('/create', [App\Http\Controllers\CashierController::class, 'create'])->name('cashier.create');
        Route::post('/store', [App\Http\Controllers\CashierController::class, 'store'])->name('cashier.store');

        //Cashier roles management
        Route::get('/role', [App\Http\Controllers\CashierRoleController::class, 'view'])->name('cashier_role.view');
        Route::get('/role/create',  [App\Http\Controllers\CashierRoleController::class, 'create'])->name('cashier_role.create');
        Route::get('/role/edit',  [App\Http\Controllers\CashierRoleController::class, 'edit'])->name('cashier_role.edit');
        Route::post('/role/store',  [App\Http\Controllers\CashierRoleController::class, 'store'])->name('cashier_role.store');
    });
});

Route::prefix('cashier')->group(function() {

    //Cashier Login
    Route::get('/login', [App\Http\Controllers\Auth\CashierLoginController::class, 'showLoginForm'])->name('cashier.login');
    Route::post('/login', [App\Http\Controllers\Auth\CashierLoginController::class, 'login'])->name('cashier.login.submit');
    Route::get('/cashier', [App\Http\Controllers\CashierHomeController::class, 'index'])->name('cashier.index');

});

Route::prefix('profile')->group(function(){

    //Admin Profiles
    Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
	Route::get('/edit',  [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
	Route::post('/upload',  [App\Http\Controllers\ProfileController::class, 'upload'])->name('profile.upload');
	Route::post('/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
	Route::match(['put', 'patch'], '/password', [App\Http\Controllers\ProfileController::class, 'password'])->name('profile.password');

});


Route::group(['middleware' => 'auth'], function () {

    //Admin Dashboard
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

    //Cashier dashboard
    Route::get('/cashier', [App\Http\Controllers\CashierHomeController::class, 'index'])->name('cashier.dashbaord');

    //Admin features
    Route::get('/dashboard/index', function () {
        return view('dashboard.main');
    });
    Route::resource('/dashboard/products', ProductController::class);
    Route::resource('/dashboard/categories', ProductCategoryController::class);
    Route::resource('/dashboard/employees', EmployeeController::class);
    Route::resource('cashier_role', CashierRoleController::class);
    Route::resource('cashier', CashierController::class);
    // Route::resource('employee', [App\Http\Controllers\EmployeeController::class]);
    Route::resource('/dashboard/stocks', StockController::class);
    Route::get('/dashboard/stocks/{id}', 'StockController@show');
    Route::resource('/dashboard/branches', BranchController::class);

    Route::resource('/dashboard/stocks', StockController::class);
    Route::get('/dashboard/stocks/{id}', 'StockController@show');
    Route::resource('/dashboard/branches', BranchController::class);

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
