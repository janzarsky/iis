<?php

namespace App\Http\Controllers;

use App\User;
use App\Meeting;
use App\Http\Controllers\Controller;

class MeetingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $meetings = Meeting::all();

        return view('meetings.index', ['meetings' => $meetings]);
    }
}
