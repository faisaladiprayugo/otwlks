<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WritterController;
use App\Http\Controllers\UserController;

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

/////////////////////////////////////////////////////////////////////
// User
Route::get('/', [UserController::class, 'index']);
Route::get('/pages', [UserController::class, 'pages']);
Route::get('/academics', [UserController::class, 'academics']);
Route::get('/admission', [UserController::class, 'admission']);
Route::get('/courses', [UserController::class, 'courses']);
