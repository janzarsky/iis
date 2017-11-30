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
        $users = User::leftJoin('users as u1', 'users.specialist_id', '=', 'u1.id')
            ->select(['users.*', 'u1.name as specialist_name'])
            ->get();

        return view('admin.index', ['users' => $users]);
    }

    public function detail($id)
    {
        $user = User::where('users.id', $id)
            ->leftJoin('users as u1', 'users.specialist_id', '=', 'u1.id')
            ->select(['users.*', 'u1.name as specialist_name',
                'u1.id as specialist_id'])
            ->get()->first();

        if ($user) {
            return view('admin.detail', ['user' => $user]);
        }
        else {
            return Redirect::route('admin');
        }
    }

    public function edit($id)
    {
        return view('admin.edit', ['user' => User::find($id)]);
    }

    public function edit_post()
    {
		$rules = array(
            'name' => 'required|min:3',
            'email' => 'required|email',
            'role' => 'required',
        );

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('admin.edit', ['id' => Input::get('id')])
				->withErrors($validator)
				->withInput(Input::except('password'));
        }
        else {
            $user = User::find(Input::get('id'));

            $user->name = Input::get('name');
            $user->email = Input::get('email');

            if (Input::get('password'))
                $user->password = Hash::make(Input::get('password'));

            switch (Input::get('role')) {
            case 'admin':
                $user->is_admin = true;
                $user->is_alcoholic = false;
                $user->is_specialist = false;
                break;
            case 'alcoholic':
                $user->is_alcoholic = true;
                $user->is_admin = false;
                $user->is_specialist = false;
                break;
            case 'specialist':
                $user->is_specialist = true;
                $user->is_alcoholic = false;
                $user->is_admin = false;
                break;
            }

            $user->save();

            return Redirect::to('admin');
        }
    }

    public function delete($id)
    {
        $user = User::find($id);

        if ($user) {
            if ($user->is_admin) {
                $other_admins = User::where('is_admin', true)
                    ->where('id', '!=', $user->id)
                    ->get();

                if ($other_admins->isEmpty())
                    return Redirect::route('admin');
            }
            else if ($user->is_specialist) {
                $pacients = User::where('specialist_id', $user->id)->get();

                if (!$pacients->isEmpty())
                    return Redirect::route('admin');
            }
            else if ($user->is_patron) {
                $alcoholics = User::where('patron_id', $user->id)->get();

                if (!$alcoholics->isEmpty())
                    return Redirect::route('admin');
            }

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
            $user->password = Hash::make(Input::get('password'));

            $user->patron_id = 0;
            $user->specialist_id = 0;

            switch (Input::get('role')) {
            case 'admin':
                $user->is_admin = true;
                break;
            case 'alcoholic':
                $user->is_alcoholic = true;
                break;
            case 'specialist':
                $user->is_specialist = true;
                break;
            }

            $user->save();

            return Redirect::to('admin');
        }
    }
}
