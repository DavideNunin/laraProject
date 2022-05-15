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
Route::get('/login', 'PublicController@login')
        ->name('login');

// rotte per il login e logout
Route::post('login', array(
        'uses' => 'MainController@doLogin'
));
Route::get('logout', array(
        'uses' => 'MainController@doLogout'
));

//rotta per registrazione
Route::get('/register', 'PublicController@register')
        ->name('register');

// pagina offerte
Route::get('/offerte', 'PublicController@offerte_user_1')
        ->name('offerte');

