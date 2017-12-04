<?php

namespace App\Http\Controllers;

use App\User;
use App\Meeting;
use App\Check;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CheckController extends Controller
{

    public function index()
    {
        $vals['checks'] = Check::join('users as u1', 'checks.alcoholic_id',
            '=', 'u1.id')
            ->select(['u1.name as name', 'checks.*'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('checks.index', $vals);
    }

    public function create()
    {
        $alcs = User::where('is_alcoholic', true)->get();

        $vals['alcoholics'] = [];

        foreach ($alcs as $a) {
            $vals['alcoholics'][$a->id] = $a->name;
        }

        return view('checks.create', $vals);
    }

    public function create_post()
    {
		$rules = array(
            'alcoholic_id' => 'required',
            'amount' => 'required|numeric',
        );

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('checks.create')
				->withErrors($validator)
				->withInput(Input::all());
        }
        else {
            $check = new Check;

            $check->alcoholic_id = Input::get('alcoholic_id');
            $check->amount = Input::get('amount')*100;
            $check->save();

            request()->session()->flash('alert-success',
                'Check successfully added');
            return Redirect::to('checks');
        }
    }

    public function delete($id)
    {
        $check = Check::find($id);

        if ($check) {
            $check->delete();

            request()->session()->flash('alert-success',
                'Check successfully deleted');
        }
        else {
            request()->session()->flash('alert-warning',
                'No check found');
        }

        return Redirect::route('checks');
    }
}
