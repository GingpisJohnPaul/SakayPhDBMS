<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trips;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trips::all();
        return view('trips')->with('trips', $trips);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trips = new Trips;

        $trips->driver_id = $request->driver;
        $trips->trips_origin = $request->origin;
        $trips->trips_destination = $request->destination;
        $trips->trips_passenger = $request->passengers;
        $trips->trips_bodynum = $request->linecode;
        $trips->trips_isArchived = $request->archived;

        $trips->save();

        $trips = Trips::all();
        return view('trips')->with('trips', $trips);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatedTrips = Trips::find($id);
        $updatedTrips->trips_origin = $request->origin;
        $updatedTrips->trips_destination = $request->destination;
        $updatedTrips->trips_passenger = $request->passengers;
        $updatedTrips->trips_bodynum = $request->linecode;
        $updatedTrips->trips_isArchived = $request->archived;
        $updatedTrips->fill($request->all());
        $updatedTrips->save();

        return redirect('trips');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Trips::find($id);
        $account->delete();

        return redirect('trips');
    }

    public function search()
    {
        $search = $_GET['search'];
        $data = Trips::where('trips_bodynum', 'LIKE', '%' . $search . '%')->get();

        return view('trips')->with('trips', $data);
    }
}
