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

// pagina di login
Route::get('login', 'PublicController@login')
        ->name('login');

//rotta per registrazione
Route::get('/register', 'PublicController@register')
        ->name('register');

// pagina offerte
Route::get('/offerte', 'PublicController@offerte_user_1')
        ->name('offerte');

Route::get('/locatore/offerte', 'PublicController@offerte_user_2')
        ->name('offerteLocatore');

//rotta homelocatore
Route::get('/homelocatore', 'PublicController@homelocatore')
        ->name('homelocatore');

Route::get('/locatore/offerte', 'PublicController@offerte_user_2')
        ->name('offerte_public_user2');

Route::get('/locatore/offerta{id}', 'PublicController@offerta_singola')
        ->name('single_offerta');

Route::get('/locatore/letueofferte', 'PublicController@offerte_locatore')
        ->name('offerte_locatore');
