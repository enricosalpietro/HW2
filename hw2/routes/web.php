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
    return view('welcome');
});

Route::get('/login', "App\Http\Controllers\LoginController@login")->name("login");
Route::post('/login', "App\Http\Controllers\LoginController@checkLogin");
Route::get("/logout", "App\Http\Controllers\LoginController@logout")->name("logout");

Route::get("/signup", "App\Http\Controllers\RegisterController@index")->name('register');
Route::post("/signup","App\Http\Controllers\RegisterController@create");
Route::post("/check_user","App\Http\Controllers\RegisterController@checkUsername")->name('check_user');

Route::get('/home', "App\Http\Controllers\HomeController@index")->name('home');

Route::get('/piloti', "App\Http\Controllers\PilotiController@index")->name('piloti');
Route::get('/piloti/caricamento', "App\Http\Controllers\PilotiController@caricaPiloti");
Route::get('/piloti/carica_pref', "App\Http\Controllers\PilotiController@caricaPreferiti");
Route::get('/piloti/aggiungi_pref/{id_pilota}', "App\Http\Controllers\PilotiController@aggiungiPreferiti");
Route::get('/piloti/rimuovi_pref/{id_pilota}', "App\Http\Controllers\PilotiController@rimuoviPreferiti");



Route::get('/gare', "App\Http\Controllers\GareController@index")->name('gare');
Route::get('/gare/carica', "App\Http\Controllers\GareController@caricaGare");
Route::get('/gare/fetch_commenti', "App\Http\Controllers\GareController@caricaCommenti")->name('fetch_commenti');
Route::get('/gare/add_commento/{commento}', "App\Http\Controllers\GareController@aggiungiCommento")->name('add_commento');



