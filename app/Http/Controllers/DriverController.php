<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Trips;

class DriverController extends Controller
{
    public function index() {
        $driver = Trips::all();
        return view('driver')->with('trips', $driver);

        // $trips = Trips::all();
        // return view('driver')->with('driver', $trips);
    }


    public function destroy($driver_id)
    {
        //

        $account = Driver::find($driver_id);
        $account->delete();

        return redirect('driver');
    }
}