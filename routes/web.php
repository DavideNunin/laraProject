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
Route::get('/offerte', 'HomeController@catalogoOfferteStandard')
        ->name('offerte');

//rotta homelocatore
Route::get('/homelocatore', 'LocatoreController@index')
        ->name('homelocatore');
Route::get('/locatore/offerta{id}', 'LocatoreController@offerta_singola')
        ->name('single_offerta');       

Route::get('/locatore/letueofferte', 'LocatoreController@offerteLocatore')
        ->name('offerte_locatore');

Route::get('/locatore/inserisciofferta', 'LocatoreController@inserisciofferta')
        ->name('inserisci_offerta');
Route::post('/locatore/inserisciofferta', 'LocatoreController@aggiungiListaOfferte')
        ->name('newOffer.store');

Route::get('/locatore/inserisciofferta/{id}', 'LocatoreController@eliminaOffertaLocatore')
        ->name('cancella_offerta'); 

//rotta per la modifica di un'offerta
Route::get ('/locatore/modificaofferta/{id}', 'LocatoreController@modificaOfferta')
        ->name('modifica_offerta');
Route::post('/locatore/modificaofferta/{id}', 'LocatoreController@updateOffer')
        ->name('updateOffer.store');

/* ------------------------ rotte admin ------------------ */
Route::get('/homeadmin', 'AdminController@index')
        ->name('homeadmin');

Route::get('/faqmanager', 'AdminController@faqmanager')
        ->name('faqmanager');
Route::post('faqmanager', 'AdminController@newfaq')
        ->name('faqmanager.result');

Route::get('faqmanager/delete', 'AdminController@deletefaq')
        ->name('faqmanager.delete');

Route::get('faqmanager/load', 'AdminController@loadfaq');
Route::post('faqmanager/update', 'AdminController@updatefaq')
        ->name('faqmanager.update');

Route::get('/stats', 'AdminController@stats')
        ->name('stats');
Route::post('/stats', 'AdminController@find')
        ->name('stats.find');

Route::get('/stats', 'AdminController@stats')
        ->name('stats');
Route::post('/stats', 'AdminController@find')
        ->name('stats.find');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/* ------------------------ rotte locatario ------------------ */
Route::get('/homelocatario', 'LocatarioController@index')
        ->name('homelocatario');

Route::get('/locatario/offerteopzionate', 'LocatarioController@offerteOpzionate')
        ->name('offerteopzionate');

Route::get('/locatario/myprofile', 'LocatarioController@myProfile')
        ->name('info_profilo');

Route::post('/locatario/myprofile', 'LocatarioController@updateData')
        ->name('modify_user_data');

Route::get('locatario/chatmenu', 'LocatarioController@chatMenu')
        ->name('locatario_chatmenu');


/* ------------------------ rotte chat ------------------ */
Route::get('/chat', 'ChatController@index')
        ->name('chat');