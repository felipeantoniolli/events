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

use App\Http\Controllers\AuthController;

// Pages
Route::get('/', ['as' => 'index.page', 'uses' => 'PageController@index']);
Route::get('/login', ['as'=> 'login.page', 'uses' => 'PageController@loginPage']);
Route::get('/register', ['as' => 'register.page', 'uses' => 'PageController@registerPage']);

// Submits
Route::post('/login', ['as' => 'login.submit', 'uses' => 'AuthController@login']);
Route::get('/logout', ['as' => 'logout.submit', 'uses' => 'AuthController@logout']);
Route::post('/register', ['as' => 'register.submit', 'uses' => 'AuthController@register']);

// Adm
Route::get('/adm', ['as' => 'adm.index', 'uses' => 'AdmController@index'])->middleware('check.adm');
Route::get('/event/new', ['as' => 'adm.newevent', 'uses' => 'EventController@newEventPage'])->middleware('check.adm');
Route::get('/event/edit/{id}', ['as' => 'adm.editevent', 'uses' => 'EventController@editEventPage'])->middleware('check.adm');
Route::post('/event/new', ['as' => 'event.submit', 'uses' => 'EventController@insert'])->middleware('check.adm');
Route::post('/event/edit', ['as' => 'event.editsubmit', 'uses' => 'EventController@edit'])->middleware('check.adm');
Route::get('/event/delete/{id}', ['as' => 'event.delete', 'uses' => 'EventController@delete'])->middleware('check.adm');

// Subscription
Route::get('/subscription', ['as' => 'subscription.index', 'uses' => 'SubscriptionController@index']);
Route::get('/subscription/subscribe/{id}', ['as' => 'subscription.subscribe', 'uses' => 'SubscriptionController@subscribe']);
Route::get("/subscription/unsubscribe/{id}", ['as' => 'subscription.unsubscribe', 'uses' => 'SubscriptionController@unsubscribe']);
