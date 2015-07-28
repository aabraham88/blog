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
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'TicketsController@create');
Route::post('/contact', 'TicketsController@store');
Route::get('/tickets','TicketsController@index');
Route::get('/tickets/{slug?}', 'TicketsController@show');
Route::get('/tickets/{slug?}/edit', 'TicketsController@edit');
Route::post('/tickets/{slug?}/edit', 'TicketsController@update');
Route::post('/tickets/{slug?}/delete', 'TicketsController@destroy');
Route::get('sendmail', function (){
	$data = array('name' => "Learning Laravel",);

	Mail::send('emails.welcome', $data, function($message){

		$message->from('alejandro_abraham@tickets.com', 'Learning Laravel');
		$message->to('alejandro_abraham@me.com')->subject('Learning Laravel test email');
	});
	return "Your email has been sent succesfully";
});
Route::post('/comment', 'CommentsController@newComment');