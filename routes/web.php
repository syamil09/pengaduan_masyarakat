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

Route::get('/', 'HomeController@landingFrontend');
Route::get('/login-masyarakat', 'AuthController@loginMasyarakat')->name('login-masyarakat');
Route::get('/login-petugas', 'AuthController@loginPetugas')->name('login-petugas');
Route::post('/login-proses', 'AuthController@loginProses')->name('login-proses');
Route::post('/register', 'AuthController@registerProses')->name('register-proses');
Route::get('/register', 'AuthController@registerMasyarakat')->name('register');
Route::get('logout', 'AuthController@logout')->name('logout');



Route::group([
		'prefix' => 'cms',
		'middleware' => 'login'
	], function() {

	Route::get('profile/{id}', 'AuthController@showProfile')->name('profile.show');
	Route::post('profile/{id}', 'AuthController@updateProfile')->name('profile.update');

	Route::get('/','HomeController@dashboard')->name('home-dashboard');
	Route::post('pengaduan/{id}/set-status', 'PengaduanController@setStatus')->name('pengaduan.set-status');
	Route::resource('pengaduan', 'PengaduanController');
	Route::resource('tanggapan', 'TanggapanController', ['except' => ['index', 'create']]);
	Route::get('tanggapan/create/{tanggapan}', 'TanggapanController@create')->name('tanggapan.create');
	Route::resource('petugas', 'PetugasController');
});

