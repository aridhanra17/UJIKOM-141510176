<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/superAdmin', function () {
    return view('superAdmin');
});

Route::get('/Admin', function () {
    return view('admin');
});

Route::get('/Keuangan', function () {
    return view('Keuangan');
});

Route::get('/Pegawai', function () {
    return view('pegawai');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('jab', 'jabatan_controller@edit');
Route::get('daftar_lembur', 'daftar_lemburController@index');
Route::resource('jabatan','jabatan_controller');
Route::resource('golongan','golongan_controller');
Route::resource('pegawai','pegawai_controller');
Route::resource('tunjangan','tunjangan_controller');
Route::resource('tunjangan_pegawai','tunjangan_pegawai_controller');
Route::resource('kategori_lembur','kategori_lembur_controller');
Route::resource('lembur_pegawai','lembur_pegawai_controller');
Route::resource('penggajian','penggajian_controller');
Route::resource('gaji_peg', 'Gaji_controller');
Route::resource('user', 'user_controller');


Route::get('Error', function()
{
    return view('errors.404');
});
