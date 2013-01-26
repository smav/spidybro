<?php

class User_Controller extends Base_Controller {

	public $restful = true;

	public function get_login()
	{
		$this->layout->nest('content', 'user.login');
	}

	public function post_login()
	{
		$userinfo = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if ( Auth::attempt($userinfo) )
		{
			return Redirect::to('/');
		}
		else
		{
			return Redirect::to('login')
				->with('login_errors', true);
		}
	}

	public function post_register()
	{
		$new_user = array(
			'username' => Input::get('username'),
			'password' => Input::get('password'),
			'email'    => Input::get('email'),
		);

		// Validation
		$rules = array(
			'username' => 'required|min:3|max:255|unique:users',
			'password' => 'required|min:4',
			'email'    => 'email',
		);
		$validation = Validator::make($new_user, $rules);
		if ( $validation->fails() )
		{
			return Redirect::to_action('user@register')
				->with('register_errors', true)
				->with_errors($validation)
				->with_input();
		}

		// Create the new user after passing validation
		// Encrypt the password
		$new_user['password'] = Hash::make($new_user['password']);
		$user = new User($new_user);
		$user->save();

		//return Redirect::to_action('user@login')->with_input()
			//->with('successmsg', 'User registered successfully');

		// log the user in
		unset($new_user['email']);
		if ( Auth::attempt($new_user) )
		{
			return Redirect::to('home');
		}
		else
		{
			return Redirect::to_action('user@login')->with_input()
				->with('successmsg', 'User registered successfully');
		}
	}

	public function get_register()
	{
		$this->layout->nest('content', 'user.register');
	}

	public function get_manage($name = '')
	{
		if (!empty($name))
		{
			$this->layout->nest('content', 'user.manage');
		}
	}
}

