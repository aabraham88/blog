<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@home');
Route::get('/home', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'TicketsController@create');
Route::post('/contact', 'TicketsController@store');
Route::get('/tickets','TicketsController@index');
Route::get('/tickets/{slug?}', 'TicketsController@show');
Route::get('/tickets/{slug?}/edit', 'TicketsController@edit');
Route::post('/tickets/{slug?}/edit', 'TicketsController@update');
Route::post('/tickets/{slug?}/delete', 'TicketsController@destroy');
// Route::get('sendmail', function (){
// 	$data = array('name' => "Learning Laravel",);

// 	Mail::send('emails.welcome', $data, function($message){

// 		$message->from('alejandro_abraham@tickets.com', 'Learning Laravel');
// 		$message->to('alejandro_abraham@me.com')->subject('Learning Laravel test email');
// 	});
// 	return "Your email has been sent succesfully";
// });
Route::post('/comment', 'CommentsController@newComment');

//-----------------------Autenticación-----------------------------

//Registracion
Route::get('users/register', 'Auth\AuthController@getRegister');
Route::post('users/register', 'Auth\AuthController@postRegister');

//Logout
Route::get('users/logout', 'Auth\AuthController@getLogout');

//Login
Route::get('users/login', 'Auth\AuthController@getLogin');
Route::post('users/login', 'Auth\AuthController@postLogin');

//-----------------------Fin Autenticación-----------------------------

Route::group(array('prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=> 'manager'), function(){
	//Admin dashboard
	Route::get('/', 'PagesController@home');
	//ver usuarios
	Route::get('users', 'UsersController@index');
	//administrar roles
	Route::get('roles', 'RolesController@index');
    Route::get('roles/create', 'RolesController@create');
    Route::post('roles/create', 'RolesController@store');
    //asignar roles a usuarios
    Route::get('users/{id?}/edit', 'UsersController@edit');
	Route::post('users/{id?}/edit','UsersController@update');
	//administrar posts
	Route::get('posts', 'PostsController@index');
	Route::get('posts/create', 'PostsController@create');
	Route::post('posts/create', 'PostsController@store');
	Route::get('posts/{id?}/edit', 'PostsController@edit');
	Route::post('posts/{id?}/edit','PostsController@update');
	//Administrar categorias
	Route::get('categories', 'CategoriesController@index');
	Route::get('categories/create', 'CategoriesController@create');
	Route::post('categories/create', 'CategoriesController@store');
});

Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug?}', 'BlogController@show');