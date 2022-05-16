<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\DriverController;

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
    return view('/home');
});
Route::get('/home', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/passenger', [PassengerController::class, 'index']);
Route::get('/driver', [DriverController::class, 'index']);
Route::get('/driver', App\Http\Controllers\DriverController::class);

// Route::prefix('admin')->group(function(){
//     Route::post('/share-post/{id}', [ App\Http\Controllers\Admin\PostController::class, 'sharePost']);
//     Route::resource('/driver', App\Http\Controllers\Admin\PostController::class);
// });


// Route::resource('/driver', App\Http\Controllers\Admin\PostController::class);

Auth::routes();


