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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function() { return view('dashboard.index');});
Route::prefix('penjual')->name('penjual.')->group(function(){
    Route::get('/', 'PenjualController@index')->name('index');
    Route::get('/create', 'PenjualController@create')->name('create');
    Route::post('/store', 'PenjualController@store')->name('store');
    Route::get('/edit/{penjual}', 'PenjualController@edit')->name('edit');
    Route::put('/update/{penjual}', 'PenjualController@update')->name('update');
    Route::delete('/delete/{penjual}', 'PenjualController@destroy')->name('destroy');
    });

Route::prefix('jenis')->name('jenis.')->group(function(){
    Route::get('/', 'JenisController@index')->name('index');
    Route::get('/create', 'JenisController@create')->name('create');
    Route::post('/store', 'JenisController@store')->name('store');
    Route::get('/edit/{jenis}', 'JenisController@edit')->name('edit');
    Route::put('/update/{jenis}', 'JenisController@update')->name('update');
    Route::delete('/delete/{jenis}', 'JenisController@destroy')->name('destroy');
    });

Route::prefix('koleksi')->name('koleksi.')->group(function(){
    Route::get('/', 'KoleksiController@index')->name('index');
    Route::get('/create', 'KoleksiController@create')->name('create');
    Route::post('/store', 'KoleksiController@store')->name('store');
    Route::get('/show/{koleksi}', 'KoleksiController@show')->name('show');
    Route::get('/edit/{koleksi}', 'KoleksiController@edit')->name('edit');
    Route::patch('/update/{koleksi}', 'KoleksiController@update')->name('update');
    Route::delete('/delete/{koleksi}', 'KoleksiController@destroy')->name('destroy');
    });

Route::prefix('kejuaraan')->name('kejuaraan.')->group(function(){
    Route::get('/', 'KejuaraanController@index')->name('index');
    Route::get('/create', 'KejuaraanController@create')->name('create');
    Route::post('/store', 'KejuaraanController@store')->name('store');
    Route::get('/show/{kejuaraan}', 'KejuaraanController@show')->name('show');
    Route::get('/edit/{kejuaraan}', 'KejuaraanController@edit')->name('edit');
    Route::patch('/update/{kejuaraan}', 'KejuaraanController@update')->name('update');
    Route::delete('/delete/{kejuaraan}', 'KejuaraanController@destroy')->name('destroy');
    });
});

// Route::get('/home', 'HomeController@index')->name('home');
