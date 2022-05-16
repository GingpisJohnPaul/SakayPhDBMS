<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    public function index() {
        $driver = Driver::all();
        return view('driver')->with('driver', $driver);
    }


    public function destroy($driver_id)
    {
        //

        $account = Driver::find($driver_id);
        $account->delete();

        return redirect('/driver');
    }
}