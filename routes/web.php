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


// pagina offerte
Route::get('/offerte', 'OffertaController@offerte_user_1')
        ->name('offerte');

//rotta homelocatore
Route::get('/homelocatore', 'LocatoreController@index')
        ->name('homelocatore');


Route::get('/locatore/offerta{id}', 'OffertaController@offerta_singola')
        ->name('single_offerta');

Route::get('/locatore/letueofferte', 'LocatoreController@offerteLocatore')
        ->name('offerte_locatore');

/* ------------------------ rotte admin ------------------ */
Route::get('/homeadmin', 'AdminController@index')
        ->name('homeadmin');

Route::get('/faqmanager', 'AdminController@faqmanager')
        ->name('faqmanager');


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/* ------------------------ rotte locatario ------------------ */
Route::get('/homelocatario', 'LocatarioController@index')
        ->name('homelocatario');
Route::get('/offerteopzionate', 'LocatarioController@offerteOpzionate')
        ->name('offerteopzionate');
