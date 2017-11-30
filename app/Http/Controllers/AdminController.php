<?php

namespace App\Http\Controllers;

use App\User;
use App\Meeting;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::join('users as u1', 'users.specialist_id', '=', 'u1.id')
            ->select(['users.name', 'users.email', 'users.is_alcoholic',
                'users.is_patron', 'users.is_specialist', 'users.is_admin',
                'u1.name as specialist_name'])
            ->get();

        return view('admin.index', ['users' => $users]);
    }

    public function detail($id)
    {
        return view('admin.detail', ['user' => User::find($id)]);
    }

    public function delete($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
        }

        return Redirect::route('admin');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function create_post()
    {
		$rules = array(
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3',
            'role' => 'required',
        );

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('admin.create')
				->withErrors($validator)
				->withInput(Input::except('password'));
        }
        else {
            $user = new User;

            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('email'));

            $user->patron_id = 0;
            $user->specialist_id = 0;

            $user->save();

            return Redirect::to('admin');
        }
    }
}
