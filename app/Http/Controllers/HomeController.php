<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\Driver;
use App\Models\Trips;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index () {
        $totalPassenger = Users::count();
        $totalDriver= Driver::count();
        $totalTrips = Trips::count();
        return view('home', compact('totalPassenger', 'totalDriver', 'totalTrips'));
    }

    public function searchdate()
    {

        $date = $_GET['date'];

        if ($date == 'today') {
            $date = Carbon::now()->toDateString();
        } elseif ($date == 'lastweek') {
            $date = Carbon::now()->subWeek(7)->toDateString();
        }elseif ($date == 'lastmonth') {
            $date = Carbon::now()->subMonth(30)->toDateString();
        }

        $totalPassenger = Users::whereDate('created_at','>=',$date)->count();
        $totalDriver = Driver::whereDate('created_at','>=',$date)->count();
        $totalTrips = Trips::whereDate('created_at','>=',$date)->count();

        return view('home', compact('totalPassenger', 'totalDriver', 'totalTrips'));
    }
}

// $query->whereDate('created_at', '=', Carbon::today()->toDateString());