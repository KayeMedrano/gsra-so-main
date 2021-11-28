<?php

namespace App\Http\Controllers;
use App\Models\store_records;
use App\Models\User;
use Carbon\Carbon;
use Charts;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Gate;

class ChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public static function totalnow() {
		$user = Auth::user()->id;
		$totnow = store_records::whereDate('time_in', Carbon::today())->where('StoreID', $user)->count();
		return $totnow;

	}

	public static function totalout() {
		$user = Auth::user()->id;
		$totout = store_records::whereDate('time_out', Carbon::today())->where('StoreID', $user)->count();
		return $totout;
	}
	public static function avail() {
		$user = Auth::user()->id;
		$totnow = store_records::whereDate('time_in', Carbon::today())->where('StoreID', $user)->count();
		$availcust = store_records::whereDate('time_out', Carbon::today())->where('StoreID', $user)->count();
		$in = $totnow - $availcust;
		$max = Auth::user()->maximum_cust;
		$available = $max - $in;
		return $available;
	}
	public static function totalcustomer() {
		$user = Auth::user()->id;
		$totnow = store_records::whereDate('time_in', Carbon::today())->where('StoreID', $user)->count();
		$totout = store_records::whereDate('time_out', Carbon::today())->where('StoreID', $user)->count();
		$tot = $totnow - $totout;

		return $tot;
	}
	public static function female() {
		$user = Auth::user()->id;
		$totnow = store_records::whereDate('time_in', Carbon::today())->where('gender', "Female")->where('StoreID', $user)->count();

		return $totnow;
	}
	public static function male() {
		$user = Auth::user()->id;
		$totnow = store_records::whereDate('time_in', Carbon::today())->where('gender', "Male")->where('StoreID', $user)->count();

		return $totnow;
	}
	public static function location() {
		$user = Auth::user()->id;
		$loc = DB::table('store_records')
			->select('address as ', DB::raw('count(*) as Total'))
			->groupBy('address')
			->limit(1)
			->orderBy('Total', 'desc')
			->whereDate('time_in', Carbon::today())
			->where('StoreID', $user)
			->get();

		return $loc;

	}

	public function index() {

		$user = Auth::user()->id;
		$TotalProfit = store_records::where(DB::raw("(DATE_FORMAT(time_in,'%Y'))"), date('Y'))->where('gender', 'Female')->where('StoreID', $user)->get();
		$profchart = Charts::database($TotalProfit, 'line', 'highcharts')
			->title("Customer per Month")
			->elementLabel('No. of Customer')

			->dimensions(300, 300)
			->responsive(true)
			->groupByMonth(date('Y'), true);
		$exchart = DB::table('store_records')
			->select(
				DB::raw('gender as gender'),
				DB::raw('count(*) as number'))
			->groupBy('gender')
			->whereDate('time_in', Carbon::today())
			->where('StoreID', $user)
			->get();
		$array[] = ['Gender', 'Number'];
		foreach ($exchart as $key => $value) {
			$array[++$key] = [$value->gender, $value->number];
		}

		$TotalProfit = store_records::where(DB::raw("(DATE_FORMAT(time_in,'%Y'))"), date('Y'))->where('StoreID', $user)->get();
		$profchart = Charts::database($TotalProfit, 'bar', 'highcharts')
			->title("Customer per Month")
			->elementLabel('No. of Customer')

			->dimensions(300, 300)
			->responsive(true)
			->groupByMonth(date('Y'), true)
			->values([0, 0, 0, 0, 0, 0, 0, 0, 6, 2, 0, 0]);
		return view('home', compact('profchart'))->with('gender', json_encode($array));

		$user = Auth::user()->id;
		$data = store_records::select('AccountID', 'time_in')->where('StoreID', $user)->get()->groupBy(function ($data) {
			return Carbon::parse($data->time_in)->format('M');
		});

	}

	public function charts() {

		$user = Auth::user()->id;
		$users = store_records::select(DB::raw("COUNT(*) as count"))
			->whereYear('time_in', date('Y'))
			->where('StoreID', $user)
			->groupBy(DB::raw("Month(time_in)"))
			->pluck('count');

		$months = store_records::select(DB::raw("Month(time_in) as month"))
			->whereYear('time_in', date('Y'))
			->where('StoreID', $user)
			->groupBy(DB::raw("Month(time_in)"))
			->pluck('month');

		$datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

		foreach ($months as $index => $month) {
			$datas[$month - 1] = $users[$index];
		}

		// for pie chart gender
		$user = Auth::user()->id;
		$result = DB::select(DB::raw("SELECT gender AS 'g', COUNT(AccountID) AS 'gc' FROM store_records where StoreID=$user GROUP BY gender;"));
		$gendercount = "";
		foreach ($result as $val) {
			$gendercount .= "['" . $val->g . "'," . $val->gc . "],";
		}

		// for treemap address
		$user = Auth::user()->id;
		$result2 = DB::select(DB::raw("SELECT DISTINCT `address` as 'cadd', COUNT(AccountID) as 'cadds' FROM `store_records` where StoreID=$user GROUP BY `address`"));
		$cadds = "";
		foreach ($result2 as $val) {
			$cadds .= "['" . $val->cadd . "','Nasugbu'," . $val->cadds . "],";
		}

		return view('home', compact('datas', 'gendercount', 'cadds'));
	}


}
