<?php

class AdminController extends BaseController {
	
	public function edit(User $user) {
		return View::make('editUser', compact('user'));
	}

	public function fadmin() {	
		return View::make('admin');							
	}

	public function register() {
		if (!Auth::check() ) { return View::make('register'); }
		return Redirect::to('/')->withErrors(['You are already registered, you may wish to logout']);
	}
		
	public function doRegister() {
		$validator = Validator::make(Input::all(),
			[ 'user_name' => 'required|unique:foblo_user',
			  'password' => 'required|between:6,24|confirmed',
			  'password_confirmation' => 'required|between:6,24',
			]		
		);
		
		if ($validator->fails()) {
			return Redirect::to('register')->withErrors($validator)->withInput();
		}

		$user_name = Input::get('user_name');
		$password = Input::get('password');
		
		$user = new User;
		$user->user_name = $user_name;
		$user->password = Hash::make($password);
		$user->save();
		if ( Auth::attempt(array('user_name' => $user_name, 'password' => $password))) {
			return Redirect::to('/')->withMessages(['You registered successfully']);
		}
		return Redirect::to('/')->withErrors(['Something is seriously wrong here, :( ']);
	}

	public function flogout() {
		Auth::logout();
		return Redirect::to('/');
	}
	
	public function flogin() {
		return View::make('login');
	}

	public function doFlogin() {
		$validator = Validator::make(Input::all(), 
			[
				'username' => 'required',
				'password' => 'required',
			]
		);

		if ($validator->fails()) {
			return Redirect::to('flogin')->withErrors($validator)->withInput();
		}

		$username = Input::get('username');
		$password = Input::get('password');
	
		if (Auth::attempt(array('user_name' => $username, 'password' => $password))) { //TODO rememberme
			//success
			return Redirect::intended('/');

		}
		//no success
		return Redirect::to('flogin')->withErrors(["Password did not match or user does not exist!"])->withInput(); 
	}
}
