<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransectionController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
///users
Route::post('insert_Users', [UserController::class, 'inserUser']);
Route::put('edit_Users/{id}',[UserController::class, 'editUser']);
Route::delete('delete_Users/{id}',[UserController::class, 'deleteUser']);
Route::get('get_Users',[UserController::class, 'getUser']);
///users

///product
Route::post('insert_Product',[ProductController::class, 'inserProduct']);
Route::put('edit_Product/{id}',[ProductController::class, 'editProduct']);
Route::delete('delete_Product/{id}',[ProductController::class, 'deleteProduct']);
Route::get('get_Product',[ProductController::class, 'getProduct']);
//product

//transection
Route::post('add_Transection', [TransectionController::class, 'addTransection']);
Route::post('delete_Transection', [TransectionController::class, 'deleteTransection']);
Route::get('show_Transection', [TransectionController::class, 'showTransection']);

//transection




