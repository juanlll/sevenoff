<?php
use App\Mail\Bienvenida;
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





Auth::routes();
Route::get('/', 'RouteController@start');
Route::get('/profile/{id}', 'RouteController@profile');
Route::get('/settings', 'RouteController@configuration');
Route::get('/notifications', 'Auth_RouteController@notifications');
Route::get('/messages', 'Auth_RouteController@messages');
Route::get('/config-user', 'Auth_RouteController@configUser');
Route::get('/config-profile', 'Auth_RouteController@configProfile');
Route::get('/config-plan', 'Auth_RouteController@configPlan');
Route::get('/config-userinfo', 'Auth_RouteController@configUserInfo');
Route::get('/api/appearance','Api_AppearanceController@index');
Route::get('/offer/{id}','Auth_RouteController@showOffer');
Route::get('/offers','Auth_RouteController@indexOffer');
Route::get('api/userinfo/','Api_UserInformationController@index');



Route::put('/api/appearanceu','Api_AppearanceController@update');
Route::put('api/profileu','Api_ProfileController@update');
Route::put('api/useru','Api_UserController@update');
Route::put('api/offer/{id}','Api_OfferController@update');
Route::put('api/userinfo/','Api_UserInformationController@update');


Route::resource('api/profile','Api_ProfileController');
Route::resource('api/offers','Api_OffersController');
Route::resource('api/images','Api_ImagesController');
Route::resource('api/offer','Api_OfferController');
Route::resource('api/user','Api_UserController');

Route::resource('api/profiles','Api_ProfilesController');



Route::get('/check', 'AuthController@checkSession');

Route::get('/enviar',function(){
	Mail::to('juan.vargasva@gmail.com')->send(new Bienvenida);
	return "mensaje enviado!";
});



Route::get('/admins',function(){
	return view('layouts.admin');
});