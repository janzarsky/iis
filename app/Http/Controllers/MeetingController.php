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

class MeetingController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;

        $vals = array();

        $vals['upcoming'] = Meeting::where(function ($query) {
                $query->where('user1_id', Auth::user()->id)
                    ->orWhere('user2_id', Auth::user()->id);
            })
            ->where('date', '>=', Carbon::now())
            ->where('confirmed', true)
            ->join('users as u1', 'meetings.user1_id', '=', 'u1.id')
            ->join('users as u2', 'meetings.user2_id', '=', 'u2.id')
            ->select(['u1.name as name1', 'u2.name as name2', 'date', 'location'])
            ->get();

        $vals['past'] = Meeting::where(function ($query) {
                $query->where('user1_id', Auth::user()->id)
                    ->orWhere('user2_id', Auth::user()->id);
            })
            ->where('date', '<', Carbon::now())
            ->where('confirmed', true)
            ->join('users as u1', 'meetings.user1_id', '=', 'u1.id')
            ->join('users as u2', 'meetings.user2_id', '=', 'u2.id')
            ->select(['u1.name as name1', 'u2.name as name2', 'date', 'location'])
            ->get();

        $vals['invites'] = Meeting::where('user2_id', $user_id)
            ->where('confirmed', false)
            ->join('users as u1', 'meetings.user1_id', '=', 'u1.id')
            ->join('users as u2', 'meetings.user2_id', '=', 'u2.id')
            ->select(['u1.name as name1', 'u2.name as name2', 'date', 'location'])
            ->get();

        $vals['waiting'] = Meeting::where('user1_id', $user_id)
            ->where('confirmed', false)
            ->join('users as u1', 'meetings.user1_id', '=', 'u1.id')
            ->join('users as u2', 'meetings.user2_id', '=', 'u2.id')
            ->select(['u1.name as name1', 'u2.name as name2', 'date', 'location'])
            ->get();

        return view('meetings.index', $vals);
    }

    public function accept($id)
    {
        $meeting = Meeting::find($id);
        $meeting->confirmed = true;
        $meeting->update();

        return Redirect::route('meetings');
    }

    public function detail($id)
    {
        $meeting = Meeting::find($id);

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
}
