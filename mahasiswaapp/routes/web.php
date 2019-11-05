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

Route::group(['middleware'=>'auth'],function(){
    Route::get('/mahasiswa/list','MhsController@listmhs')->name('list.mhs');
    Route::get('/matkul/list','MatkulController@listmatkul')->name('list.matkul');
    Route::get('/kelas/list','KelasController@listkelas')->name('list.kelas');
    
    Route::get('/mahasiswa/form', 'MhsController@formmhs')->name('form.mhs');
    Route::get('/matkul/form', 'MatkulController@formmatkul')->name('form.matkul');
    Route::get('/kelas/form', 'KelasController@formkelas')->name('form.kelas');
    
    Route::post('/mahasiswa/simpan','MhsController@simpanmhs')
        ->name('simpan.mhs');
    Route::post('/matkul/simpan','MatkulController@simpanmatkul')
        ->name('simpan.matkul');
    Route::post('/kelas/simpan','KelasController@simpankelas')
        ->name('simpan.kelas');
    
    Route::post('/mahasiswa/edit/{id}','MhsController@editmhs')
        ->name('edit.mhs');
    Route::post('/matkul/edit/{id}','MatkulController@editmatkul')
        ->name('edit.matkul');
    Route::post('/kelas/edit/{id}','KelasController@editkelas')
        ->name('edit.kelas');
    
    Route::get('/mahasiswa/delete/{id}','MhsController@deletemhs')->name('hapus.mhs');
    Route::get('/matkul/delete/{id}','MatkulController@deletematkul')->name('hapus.matkul');
    Route::get('/kelas/delete/{id}','KelasController@deletekelas')->name('hapus.kelas');
    
    Route::get('/mahasiswa/ubah/{id}','MhsController@ubahmhs')->name('ubah.mhs');
    Route::get('/matkul/ubah/{id}','MatkulController@ubahmatkul')->name('ubah.matkul');
    Route::get('/kelas/ubah/{id}','KelasController@ubahkelas')->name('ubah.kelas');
});



Auth::routes();
