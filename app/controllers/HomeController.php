<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home() {
		$posts = Post::all();	
		$posts = $posts->sortBy('created_at')->reverse();
		$createHomeView = function($post) {return View::make('post',['post' => $post]); };
		$posts = array_map($createHomeView, $posts->all());
		return View::make('home', compact('posts'));
	}

}
