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

class AdminController extends Controller
{

    public function index()
    {
        return var_dump(Auth::user());
    }
}
