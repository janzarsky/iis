<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class MeetingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('meetings.index', ['text' => 'asdfqefwfds']);
    }
}
