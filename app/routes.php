<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// User
Route::model('user', 'User');
Route::get('/user/edit/{user}', 'AdminController@edit');
Route::post('/user/edit/', 'AdminController@doEdit');

// Admin


Route::get('/register', 'AdminController@register');
Route::post('/register', 'AdminController@doRegister');


Route::get('/flogout', array('before' => 'auth', 'uses' => 'AdminController@flogout'));

Route::get('/fadmin', array('before' => 'auth', 'uses' => 'AdminController@fadmin'));
Route::get('/flogin', 'AdminController@flogin');
Route::post('/flogin','AdminController@doFlogin');


// POST

Route::model('post', 'Post');

Route::get('/post/{post}', 'PostController@viewPost');

Route::get('/post/edit/{post}', array('before' => 'auth', 'uses' => 'PostController@edit'));
Route::post('/post/edit', array('before' => 'auth', 'uses' => 'PostController@doEdit'));

Route::post('/post/delete', array('before' => 'auth', 'uses' => 'PostController@doDelete'));
Route::get('/post/delete/{post}', array('before' => 'auth', 'uses' => 'PostController@delete'));

Route::post('/post/new', array('before' => 'auth', 'uses' => 'PostController@newPost'));


// STATIC

Route::get('/', 'HomeController@home');

Route::get('/about', function() {
	return View::make('about');
});

Route::get('/contact', function() {
	return View::make('contact');
});

//TODO move to controller
Route::post('contact', function() {
	$data = Input::all();
	$rules = array(
		'subject' => 'required',
		'message' => 'required'
	);
	
	$validator = Validator::make($data, $rules);

	if($validator -> fails()) {
		return Redirect::to('contact')->withErrors($validator)->withInput();
	}
		
	return 'Your message has been sent';
});
