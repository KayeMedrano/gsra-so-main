<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Image;
use Gate;
use Validator;

class UserController extends Controller {
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function edit() 
	{
		if (Auth::user()) {
			$user = User::find(Auth::user()->id);

			if ($user) {
				return view('sa_settings')->withUser($user);
			} else {
				return redirect()->back();
			}
		} else {
			return redirect()->back();
		}
	}

	public function update(Request $request) 
	{
		$user = User::find(Auth::user()->id);
		
		if($request->hasFile('img'))
		{
			$this->validate($request,[
				'img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
			]);
			
			$image = $request->file('img');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$image->move(public_path("/img/"),$filename);
			
			$user->Image = $filename;
			$user->save();
			return back()->with('success-img','Image updated successfully!');

		}

		if ($user) 
		{
			$validate = null;
			if (Auth::user()->email === $request['email']) {
				$validate = $request->validate([
					'StoreName' => 'required|min:2',
					'maximum_cust' => 'required|min:2',
					'StoreOwner' => 'required|min:2',
					'email' => 'required|email',
				]);
			} else {
				$validate = $request->validate([
					'StoreName' => 'required|min:2',
					'maximum_cust' => 'required|min:2',
					'StoreOwner' => 'required|min:2',
					'email' => 'required|email|unique:users',
				]);
			}

			if ($validate) {
				$user->StoreName = $request['StoreName'];
				$user->maximum_cust = $request['maximum_cust'];
				$user->StoreOwner = $request['StoreOwner'];
				$user->email = $request['email'];

				$user->save();
				$request->session()->flash('success', 'Your User Information has now been updated!');
				return redirect()->back();
			} else {
				return redirect()->back();
			}

		} else {
			return redirect()->back();
		}
	}

	public function updateprof() 
	{
		return view('sa_settings', array('user' => Auth::user()));
	}


}
