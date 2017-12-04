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

        $vals['alcoholic'] = User::where('users.patron_id', $user_id)
            ->where('users.patron_confirmed', true)
            ->select(['id', 'name'])
            ->get()->first();

        $vals['patron_requests'] = User::where('patron_id', $user_id)
            ->where('patron_confirmed', false)
            ->select(['id', 'name'])
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
        $user_id = Auth::user()->id;

        $pat = User::find($user_id);

        if ($pat->is_patron) {
            $pat->is_patron = false;
            $pat->save();

            $alc = User::where('patron_id', $user_id)->get()->first();

            if ($alc) {
                $alc->patron_id = NULL;
                $alc->patron_confirmed = true;
                $alc->save();

                request()->session()->flash('alert-success',
                    'You are not patron anymore');
            }
        }
        else {
            request()->session()->flash('alert-danger',
                'You are not patron');
        }

        return Redirect::route('patrons');
    }

    public function accept($id) {
        $user_id = Auth::user()->id;

        $pat = User::find($user_id);

        if (!$pat->is_patron) {
            $pat->is_patron = true;
            $pat->save();

            $alc = User::find($id);
            $alc->patron_confirmed = true;
            $alc->save();

            request()->session()->flash('alert-success',
                'Request accepted');
        }
        else {
            request()->session()->flash('alert-danger',
                'You are already patron');
        }

        return Redirect::route('patrons');
    }

    public function decline($id) {
        $alc = User::find($id);

        if ($alc) {
            $alc->patron_id = NULL;
            $alc->save();
        }

        request()->session()->flash('alert-success',
            'Request declined');
        return Redirect::route('patrons');
    }
}
