<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RakControllerResourceModel;
use Illuminate\Support\Facades\Route;

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

Route::get('/old-index', function () {
    return view('oldindex');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/peminjaman', function () {
    return view('peminjaman');
});
// Route::get('/rak-buku', function () {
//     return view('rak_buku');
// });

//Langsung menjalankan 7 function resource
Route::resource('/rak-buku', RakControllerResourceModel::class);
Route::resource('/kategori-buku', KategoriController::class);
Route::resource('/buku', BukuController::class);

//Generate route setiap function
// Route::get('/rak-buku',[RakControllerResourceModel::class,'index']);
