<?php

namespace App\Http\Controllers;

use App\User;
use App\Session;
use App\UserSession;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;

        $vals['organizing'] = Session::join('users as u1',
            'sessions.organizer_id', '=', 'u1.id')
            ->where('organizer_id', $user_id)
            ->select(['sessions.*', 'u1.id as organizer_id',
                'u1.name as organizer_name'])
            ->get();

        $vals['attending'] = Session::join('users as u1',
            'sessions.organizer_id', '=', 'u1.id')
            ->join('users_sessions', 'sessions.id', '=',
                'users_sessions.session_id')
            ->select(['sessions.*', 'u1.id as organizer_id',
                'u1.name as organizer_name'])
            ->where('users_sessions.user_id', $user_id)
            ->get();

        $vals['other'] = Session::join('users as u1',
            'sessions.organizer_id', '=', 'u1.id')
            ->select(['sessions.id as session_id', 'u1.id as organizer_id',
                'u1.name as organizer_name', 'sessions.*'])
            ->where('sessions.organizer_id', '!=', $user_id)
            ->whereNotIn('sessions.id', function ($query) use($user_id) {
                $query->select('session_id')
                    ->from('users_sessions')
                    ->where('user_id', $user_id);
            })
            ->get();

        $counts = UserSession::groupBy('session_id')
            ->select(['session_id', DB::raw('count(*) as user_count')])
            ->get();

        $vals['counts'] = [];

        foreach ($counts as $c) {
            $vals['counts'][$c->session_id] = $c->user_count;
        }

        return view('sessions.index', $vals);
    }

    public function create()
    {
        request()->session()->flash('alert-warning',
            'Not implemented');
        return Redirect::route('sessions');
    }

    public function create_post()
    {
        request()->session()->flash('alert-warning',
            'Not implemented');
        return Redirect::route('sessions');
    }

    public function attend($id)
    {
        $user_id = Auth::user()->id;

        $session = Session::find($id);

        if ($session) {
            $us = new UserSession;
            $us->user_id = $user_id;
            $us->session_id = $session->id;
            $us->save();

            request()->session()->flash('alert-success',
                'Successfully signed up for session');
        }
        else {
            request()->session()->flash('alert-warning',
                'No session found');
        }

        return Redirect::route('sessions');
    }

    public function cancel($id)
    {
        $user_id = Auth::user()->id;

        $session = Session::find($id);

        if ($session) {
            $us = UserSession::where('user_id', $user_id)
                ->where('session_id', $session->id)
                ->get()->first();

            if ($us) {
                $us->delete();

                request()->session()->flash('alert-success',
                    'Successfully signed out of session');
            }
            else {
                request()->session()->flash('alert-warning',
                    'You do not attend this session');
            }
        }
        else {
            request()->session()->flash('alert-warning',
                'No session found');
        }

        return Redirect::route('sessions');
    }

    public function detail($id)
    {
        $vals['session'] = Session::where('sessions.id', $id)
            ->join('users', 'users.id', '=', 'sessions.organizer_id')
            ->select(['sessions.*', 'users.name as organizer_name'])
            ->get()->first();

        if ($vals['session']) {
            return view('sessions.detail', $vals);
        }
        else {
            request()->session()->flash('alert-danger',
                'Session does not exist');
            return Redirect::route('sessions');
        }
    }
 
    public function delete($id)
    {
        $session = Session::find($id);

        if ($session) {
            $user_id = Auth::user()->id;

            if ($session->organizer_id == $user_id) {
                $session_users = UserSession::where('session_id', $session->id)
                    ->get();

                foreach ($session_users as $u) {
                    $u->delete();
                }

                $session->delete();

                request()->session()->flash('alert-success',
                    'Session successfuly removed');
            }
            else {
                request()->session()->flash('alert-danger',
                    'You are not allowed to remove this session');
            }
        }
        else {
            request()->session()->flash('alert-danger',
                'Session does not exist');
        }

        return Redirect::route('sessions');
    }
}
