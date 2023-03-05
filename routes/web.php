<?php

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
Route::get('/rak-buku', function () {
    return view('rak_buku');
});

// Route::options('option',function(){
//     return 'https://laravel.com/docs/9.x/routing/';
// });
