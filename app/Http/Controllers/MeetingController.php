<?php

namespace App\Http\Controllers;

use App\User;
use App\Meeting;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class MeetingController extends Controller
{

    public function index()
    {
        $upcoming = Meeting::where('date', '>=', Carbon::now())
            ->where('confirmed', true)
            ->get();

        $past = Meeting::where('date', '<', Carbon::now())
            ->where('confirmed', true)
            ->get();

        $invites = Meeting::where('confirmed', false)->get();

        return view('meetings.index', ['upcoming' => $upcoming, 'past' => $past,
            'invites' => $invites]);
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
        return view('meetings.create');
    }

    public function create_post()
    {
		$rules = array(
            'location' => 'required',
            'date' => 'required',
        );

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('meetings.create')
				->withErrors($validator)
				->withInput(Input);
        }
        else {
            $meeting = new Meeting;

            $meeting->location = Input::get('location');
            $meeting->date = Input::get('date');

            // TODO
            $meeting->user_id = 1;
            $meeting->alcoholic_id = 1;
            $meeting->patron_id = 1;

            $meeting->save();

            return Redirect::to('meetings');
		}
    }
}
