<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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

Route::prefix('app')->group(function(){
    Route::post('edit_basic_info',[ProfileController::class, 'editBasicInfo']);
    Route::post('login_user',[AuthController::class, 'loginUser']);
    Route::post('register_user',[AuthController::class, 'registerUser']);

});

Route::get('/logout',[AuthController::class, 'logout']);
Route::get('/',[HomeController::class, 'index']);
Route::any('{slug}', [HomeController::class, 'index'])->where('slug', '([A-z\d\-\/_.]+)?');
