<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('users.login', []);
    }

    public function doLogin()
    {

		$rules = array(
            'email'    => 'required|email',
            'password' => 'required|min:3'
        );

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			if (Auth::attempt($userdata)) {
                return Redirect::to('meetings');
			} else {
                return Redirect::to('login')
                    ->withErrors(['email' => 'Invalid email or password']);
			}
		}
    }
}
