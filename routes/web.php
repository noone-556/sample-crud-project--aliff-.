<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', 'HomeController@dashboard')->name('dashboard');

Route::get('/daftar', 'HomeController@daftarRed')->name('daftar.user');

Route::post('/daftar-pekerja', 'HomeController@daftar_pekerja');

Route::get('/disp-maklumat', 'HomeController@getMaklumat');

Route::get('/semak-email', 'HomeController@semakEmail');

Route::post('/kemaskini-maklumat', 'HomeController@updateMaklumat');

Route::delete('/padam-maklumat/{id}', 'HomeController@padamMaklumat');