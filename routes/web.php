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
Route::get('/', 'PublicController@showHomeUser1')
        ->name('homeUser1');

// Rotte per l'autenticazione
Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');
        

// Rotte per la registrazione
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');

//rotta per registrazione
//Route::get('/register', 'PublicController@register')
       // ->name('register');

// pagina offerte
Route::get('/offerte', 'OffertaController@offerte_user_1')
        ->name('offerte');

Route::get('/locatore/offerte', 'OffertaController@offerte_user_2')
        ->name('offerteLocatore');

//rotta homelocatore
Route::get('/homelocatore', 'LocatoreController@index')
        ->name('homelocatore');

Route::get('/locatore/offerte', 'OffertaController@offerte_user_2')
        ->name('offerte_public_user2');

Route::get('/locatore/offerta{id}', 'OffertaController@offerta_singola')
        ->name('single_offerta');

Route::get('/locatore/letueofferte', 'LocatoreController@offerteLocatore')
        ->name('offerte_locatore');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
