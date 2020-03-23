<?php

use Illuminate\Http\Request;

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

Route::post('register', 'petugascontroller@register');
Route::post('login', 'petugascontroller@login');
Route::get('user', 'petugascontroller@getAuthenticatedUser')->middleware('jwt.verify');

//pelanggan
Route::post('/simpan_pelanggan','pelanggancontroller@store')->middleware('jwt.verify');
Route::put('/ubah_pelanggan/{id}','pelanggancontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_pelanggan/{id}','pelanggancontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_pelanggan','pelanggancontroller@tampil_pelanggan')->middleware('jwt.verify');

//jenis_cuci
Route::post('/simpan_jenis','jenis_cucicontroller@store')->middleware('jwt.verify');
Route::put('/ubah_jenis/{id}','jenis_cucicontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_jenis/{id}','jenis_cucicontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_jenis','jenis_cucicontroller@tampil_jenis_cuci')->middleware('jwt.verify');

//detail_transaksi
Route::post('/simpan_detail','detail_transaksicontroller@store')->middleware('jwt.verify');
Route::put('/ubah_detail/{id}','detail_transaksicontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_detail/{id}','detail_transaksicontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_detail','detail_transaksicontroller@tampil_detail')->middleware('jwt.verify');

//transaksi
Route::post('/simpan_transaksi','transaksicontroller@store')->middleware('jwt.verify');
Route::put('/ubah_transaksi/{id}','transaksicontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_transaksi/{id}','transaksicontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_transaksi/{tgl_transaksi}/{tgl_selesai}','transaksicontroller@tampil_transaksi')->middleware('jwt.verify');