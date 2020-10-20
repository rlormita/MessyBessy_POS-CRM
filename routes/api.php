<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories', 'ProductCategoryController@result');
Route::get('products', 'ProductController@result');
Route::post('products', 'ProductController@store');

Route::group(['prefix' => '/v1', 'namespace' => 'App\Http\Controllers', 'as' => 'api.', ], function () {
    Route::resource('products', 'ProductController', ['except' => ['create', 'edit']]);
    Route::resource('categories', 'ProductCategoryController', ['except' => ['create', 'edit']]);
});


Route::middleware('auth:api')->post('logout', function (Request $request) {
    
    if (auth()->user()) {
        $user = auth()->user();
        $user->api_token = null; // clear api token
        $user->save();

        return response()->json([
            'message' => 'Thank you for using our application',
        ]);
    }
    
    return response()->json([
        'error' => 'Unable to logout user',
        'code' => 401,
    ], 401);
});

