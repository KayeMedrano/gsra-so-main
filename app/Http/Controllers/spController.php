<?php

namespace App\Http\Controllers;

use Gate;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\customer_account;

class spController extends Controller
{
    public function __construct() {
		$this->middleware('auth');
	}

    public function update(Request $request) 
    {
        $user = User::find(Auth::user()->id);

        if ($user) {
            $validate = null;
            if (Auth::user()->email === $request['email']) {
                $validate = $request->validate([
                    'email' => 'required|min:2',
                    'sp_password' => 'required|min:2',
                
                ]);
            } else {
                $validate = $request->validate([
                    'email' => 'required|email|unique:users',
                    'sp_password' => 'required|min:2',
                
                ]);
            }

            if ($validate) {
                $user->email = $request['email'];
                $user->sp_password= $request['sp_password'];

                $user->save();
                $request->session()->flash('success', 'Store Personnel Password has now been updated!');
                return redirect()->back();
            } else {
                return redirect()->back();
            }

        } 
        else 
        {
            return redirect()->back();
        }

    }

    public function edit()
    {
        if(Auth::user())
        {
            $user = User::find(Auth::user()->id);
        
            if($user)
            { 
                return view('sp_password')->withUser($user);
            }
            else 
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}
