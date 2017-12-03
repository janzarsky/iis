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

class PatronController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;

        $vals['patron'] = User::join('users as u1', 'users.patron_id',
            '=', 'u1.id')
            ->where('users.id', $user_id)
            ->where('users.patron_confirmed', true)
            ->select(['u1.id as id', 'u1.name as name'])
            ->get()->first();

        $vals['request'] = User::join('users as u1', 'users.patron_id',
            '=', 'u1.id')
            ->where('users.id', $user_id)
            ->where('users.patron_confirmed', false)
            ->select(['u1.id as id', 'u1.name as name'])
            ->get()->first();

        $vals['alcoholics'] = User::where('patron_id', $user_id)
            ->get();

        return view('patrons.index', $vals);
    }

    public function remove() {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);
        $patron_id = $user->patron_id;
        $user->patron_id = NULL;
        $user->patron_confirmed = false;
        $user->save();

        $patron = User::find($patron_id);

        if ($patron) {
            $patron->is_patron = false;
            $patron->save();
        }

        request()->session()->flash('alert-success',
            'Patron removed');

        return Redirect::route('patrons');
    }

    public function cancel() {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);
        $user->patron_id = NULL;
        $user->save();

        request()->session()->flash('alert-success',
            'Request cancelled');

        return Redirect::route('patrons');
    }

    public function request() {
        $user_id = Auth::user()->id;

        $users = User::where('is_patron', false)
            ->where('id', '!=', $user_id)
            ->select(['id', 'name'])
            ->get();

        $options = [];

        foreach ($users as $u) {
            $options[$u->id] = $u->name;
        }

        return view('patrons.request', ['options' => $options]);
    }

    public function request_post() {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);
        $user->patron_id = Input::get('patron_id');
        $user->save();

        request()->session()->flash('alert-success',
            'Patron successfully requested');
        return Redirect::route('patrons');
    }

    public function stop() {

    }

    public function accept($id) {

    }

    /*
    public function accept($id)
    {
        $meeting = Meeting::find($id);
        $meeting->confirmed = true;
        $meeting->update();

        return Redirect::route('meetings');
    }

    public function detail($id)
    {
        $meeting = Meeting::where('meetings.id', $id)
            ->join('users as u1', 'meetings.user1_id', '=', 'u1.id')
            ->join('users as u2', 'meetings.user2_id', '=', 'u2.id')
            ->select(['meetings.*', 'u1.name as name1', 'u2.name as name2'])
            ->get()->first();

        return view('meetings.detail', ['meeting' => $meeting]);
    }

    public function delete($id)
    {
        $meeting = Meeting::find($id);
        $meeting->delete();

        return Redirect::route('meetings');
    }

    public function create()
    {
        $user = Auth::user();
        $available_users = array();

        if ($user->patron_id != 0) {
            $patron = User::find($user->patron_id);
            $available_users[$user->patron_id] = $patron->name . ' (my patron)';
        }

        $users = User::where('patron_id', $user->id)->get();

        foreach ($users as $u) {
            $available_users[$u->id] = $u->name;
        }

        return view('meetings.create', ['available_users' => $available_users]);
    }

    public function create_post()
    {
		$rules = array(
            'location' => 'required',
            'date' => 'required',
            'with' => 'required',
        );

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('meetings.create')
				->withErrors($validator)
				->withInput(Input::all());
        }
        else {
            $meeting = new Meeting;

            $meeting->location = Input::get('location');
            $meeting->date = Input::get('date');
            $meeting->user1_id = Auth::user()->id;
            $meeting->user2_id = Input::get('with');
            $meeting->confirmed = false;

            $meeting->save();

            return Redirect::to('meetings');
		}
    }
     */
}
