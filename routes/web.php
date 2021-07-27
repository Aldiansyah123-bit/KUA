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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//admin
Route::group(['middleware' => ['auth','ceklevel:admin']], function(){
    //pendaftar
    Route::get('/pendaftar', 'PendaftarController@index');
    Route::get('/pendaftar/delete/{id}', 'PendaftarController@destroy');

    //kehadiran
    Route::get('/admin/kehadiran','KehadiranController@index');
    Route::get('/kehadiran/delete/{id}','KehadiranController@destroy');

    //Materi
    Route::get('/materi/add','MateriController@create');
    Route::post('/materi/create','MateriController@store');
    Route::get('/materi/edit/{id}','MateriController@edit');
    Route::post('/materi/update/{id}','MateriController@update');
    Route::get('/materi/delete/{id}','MateriController@destroy');

    //ujian
    Route::get('/ujian','UjianController@index');
    Route::get('/ujian/add','UjianController@store');
    Route::get('/ujian/edit/{id}','UjianController@edit');
    Route::post('/ujian/update/{id}','UjianController@update');
    Route::post('/ujian/create','UjianController@create');
    Route::get('/ujian/delete/{id}','UjianController@destroy');

    //Lolos atau Tidak Lolos
    Route::get('/lolos','NilaiController@lolos');
    Route::get('/tidak','NilaiController@tidak');
});

Route::group(['middleware' => ['auth','ceklevel:admin,user']], function(){
    Route::get('home', 'HomeController@index')->name('home');
    //Kehadiran
    Route::get('/kehadiran','KehadiranController@indexuser');
    Route::get('/kehadiran/add','KehadiranController@create');
    //Materi
    Route::get('/materi','MateriController@index');
    Route::get('/materi/detail/{id}','MateriController@show');
    Route::get('/soal','UjianController@soal');
    Route::get('/get-soal','UjianController@getSoal');
    //Cetak Sertifikat
    Route::get('/cetak/pdf','UjianController@laporanPDF');
});
