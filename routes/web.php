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

Route::get('/', 'LandingController@index');
Route::get('/login-masyarakat', 'AuthController@loginMasyarakat')->name('login-masyarakat');
Route::get('/login-petugas', 'AuthController@loginPetugas')->name('login-petugas');
Route::post('/login-proses', 'AuthController@loginProses')->name('login-proses');
Route::post('/register', 'AuthController@registerProses')->name('register-proses');
Route::get('/register', 'AuthController@registerMasyarakat')->name('register');
// Route::group(['prefix' => 'member'], function() {
// 	// Route::get('/home', 'MemberController@')
// })


// Auth::routes();

// Route::get('/login-masyarakat', 'HomeController@index')->name('home');
Route::get('logout', 'HomeController@logout')->name('logout');

Route::group(['prefix' => 'cms'], function() {
	Route::get('/','DashboardController@index');
	Route::post('pengaduan/{id}/set-status', 'PengaduanController@setStatus')->name('pengaduan.set-status');
	Route::resource('pengaduan', 'PengaduanController');
	Route::resource('tanggapan', 'TanggapanController', ['except' => ['index', 'create']]);
	Route::get('tanggapan/create/{tanggapan}', 'TanggapanController@create')->name('tanggapan.create');
	Route::resource('petugas', 'PetugasController');
	Route::resource('team', 'TeamController');

	Route::get('hero', 'LandingController@heroGet')->name('hero.index');
	Route::put('hero/{id}', 'LandingController@heroUpdate')->name('hero.update');

	Route::get('about', 'LandingController@aboutGet')->name('about.index');
	Route::put('about/{id}', 'LandingController@aboutUpdate')->name('about.update');
});

