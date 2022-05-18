<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\BookedTripsController;
use Illuminate\Support\Facades\DB;

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
Route::get('/trips', [TripsController::class, 'index']);
Route::get('/bookedtrips', [BookedTripsController::class, 'index']);
// Route::get('/driver', [TripsController::class, 'index']);

// Route::get('/driver', function(){
//     $data = DB::table('users')
//         ->join('posts', 'users.id', '=', 'posts.user_id')
//         ->select('users.*', 'posts.title')
//         ->get();
//     dd($data);
// });

// Route::prefix('admin')->group(function(){
//     Route::post('/share-post/{id}', [ App\Http\Controllers\Admin\PostController::class, 'sharePost']);
//     Route::resource('/driver', App\Http\Controllers\Admin\PostController::class);
// });


// Route::resource('/driver', App\Http\Controllers\Admin\PostController::class);

// Route::resource('trips', TripsController::class);
// Route::resource('driver', DriverController::class);
Route::resource('/passenger', App\Http\Controllers\PassengerController::class);
Route::resource('/driver', App\Http\Controllers\DriverController::class);
Route::resource('/bookedtrips', App\Http\Controllers\BookedTripsController::class);
Route::resource('/trips', App\Http\Controllers\TripsController::class);

Route::get('/search-bookedtrips', 'App\Http\Controllers\BookedTripsController@search');
Route::get('/search-trips', 'App\Http\Controllers\TripsController@search');
Route::get('/search-drivers', 'App\Http\Controllers\DriverController@search');
Route::get('/search-passengers', 'App\Http\Controllers\PassengerController@search');


Auth::routes();


