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



///////////////////////////////////////////////////////////////////////
// Login Admin
Route::get('/login-admin', [AdminController::class, 'login']);
Route::post('/login-admin/store', [AdminController::class, 'storeLogin']);


///////////////////////////////////////////////////////////////////////
// Admin
Route::group(['middleware' => 'adminsession'], function(){
    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin/manage-writter', [AdminController::class, 'manageWritter']);
    Route::get('/admin/tambah-writter', [AdminController::class, 'tambahWritter']);
    Route::post('/admin/store-writter', [AdminController::class, 'storeWritter']);
    Route::get('/admin/edit-writter/{id}', [AdminController::class, 'editWritter']);
    Route::post('/admin/edited-writter/{id}', [AdminController::class, 'editedWritter']);
    Route::get('/admin/hapus-writter/{id}', [AdminController::class, 'hapusWritter']);

    Route::get('/admin/headmaster', [AdminController::class, 'headmaster']);
    Route::get('/admin/edit-headmaster/', [AdminController::class, 'editHeadmaster']);
    Route::post('/admin/edited-headmaster/', [AdminController::class, 'editedHeadmaster']);

    Route::get('/admin/manage-about', [AdminController::class, 'manageAbout']);
    Route::get('/admin/edit-about', [AdminController::class, 'editAbout']);
    Route::post('/admin/edited-about', [AdminController::class, 'editedAbout']);

    Route::get('/admin/tambah-sub-about', [AdminController::class, 'tambahSubAbout']);
    Route::post('/admin/store-sub-about', [AdminController::class, 'storeSubAbout']);
    Route::get('/admin/edit-sub-about/{id}', [AdminController::class, 'editSubAbout']);
    Route::post('/admin/edited-sub-about/{id}', [AdminController::class, 'editedSubAbout']);
    Route::get('/admin/hapus-sub-about/{id}', [AdminController::class, 'hapusSubAbout']);

    Route::get('/admin/logout', [AdminController::class, 'logout']);
});



///////////////////////////////////////////////////////////////////////
// Writter
Route::group(['middleware' => 'writtersession'], function(){
    Route::get('/writter', [WritterController::class, 'index']);
    
    Route::get('/writter/manage-news', [WritterController::class, 'news']);
    Route::get('/writter/tambah-news', [WritterController::class, 'tambahNews']);
    Route::post('/writter/store-news', [WritterController::class, 'storeNews']);
    Route::get('/writter/edit-news/{id}', [WritterController::class, 'editNews']);
    Route::post('/writter/edited-news/{id}', [WritterController::class, 'editedNews']);
    Route::get('/writter/hapus-news/{id}', [WritterController::class, 'hapusNews']);

    Route::get('/writter/manage-events', [WritterController::class, 'events']);
    Route::get('/writter/tambah-events', [WritterController::class, 'tambahEvents']);
    Route::post('/writter/store-events', [WritterController::class, 'storeEvents']);
    Route::get('/writter/edit-events/{id}', [WritterController::class, 'editEvents']);
    Route::post('/writter/edited-events/{id}', [WritterController::class, 'editedEvents']);
    Route::get('/writter/hapus-events/{id}', [WritterController::class, 'hapusEvents']);

    Route::get('/writter/manage-kategori', [WritterController::class, 'kategori']);
    Route::get('/writter/tambah-kategori', [WritterController::class, 'tambahKategori']);
    Route::post('/writter/store-kategori', [WritterController::class, 'storeKategori']);
    Route::get('/writter/edit-kategori/{id}', [WritterController::class, 'editKategori']);
    Route::post('/writter/edited-kategori/{id}', [WritterController::class, 'editedKategori']);
    Route::get('/writter/hapus-kategori/{id}', [WritterController::class, 'hapusKategori']);

    Route::get('/writter/logout', [WritterController::class, 'logout']);
});
