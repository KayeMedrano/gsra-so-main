<?php

namespace App\Http\Controllers;

use App\Models\store_records;
use Gate;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\customer_accounts;

class soController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}

	public static function totalamount()
	{
		$user = Auth::user()->id;
		$tot = store_records::where('StoreID',$user)->count('id');
		return $tot;
	}
    
	public function update(Request $request)
 	{
 
		$user = User::find(Auth::user()->id);
 
 		if($user)
 		{
 			$user->email = $request['email'];
 			$user->password =Hash::make( $request['password']);

 			$user->save();
 			$request->session()->flash('success','Your Password have now been updated!');
 			return redirect()->back();
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
 				return view('so_password')->withUser($user);
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

	public function report(Request $request)
	{
		$user = Auth::user()->id;
		if (request()->has('fromDate') && request()->has('toDate')) 
		{
			$fromDate = $request->input('fromDate');
			$toDate = $request->input('toDate');

			$data = \DB::select("SELECT * FROM store_records WHERE time_in BETWEEN '$fromDate 00:00:00' AND '$toDate 00:00:00' AND StoreID = $user ");
		
		}
		else
		{
			$data = store_records::all()->where('StoreID',$user);
		}
		
		return view("reports")->with("data", $data);
		
	}

	public static function ltid() 
	{
		$lid = store_records::orderBy('id', 'desc')->first()->id + 1;
		return $lid;
	}

	public function index() 
	{

		$show = store_records::all();
		return view("report/id")->with("show", $show);
	}
	
	public function show($sh) {

		$show = customer_accounts::find($sh);
		return view("rshow")->with("show", $show);
		
	}

	public function destroy($id) {

	}
}
