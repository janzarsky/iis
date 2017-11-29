<?php

namespace App\Http\Controllers;

use App\User;
use App\Meeting;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class MeetingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
}
