<?php

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

Route::get('/', 'MhsController@home')->name('home');
Route::get('list','MhsController@listmhs')->name('list.mhs');
Route::get('form', 'MhsController@formmhs')->name('form.mhs');

Route::post('simpan','MhsController@simpanform')
    ->name('simpan.mhs');

Route::post('edit/{id}','MhsController@editform')
    ->name('edit.mhs');

Route::get('delete/{id}','MhsController@deletemhs')->name('hapus.mhs');

Route::get('ubah/{id}','MhsController@ubahmhs')->name('ubah.mhs');
