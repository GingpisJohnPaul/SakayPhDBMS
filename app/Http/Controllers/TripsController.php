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
        $password = "123";
        $trips = Trips::join('driver_tbl', 'trips_tbl.driver_id', '=', 'driver_tbl.driver_id')
                    ->where('trips_tbl.trips_isArchived', '=', 'No')
                    ->get(['driver_tbl.driver_name', 'trips_tbl.*']);
        $archivedtrips = Trips::join('driver_tbl', 'trips_tbl.driver_id', '=', 'driver_tbl.driver_id')
                    ->where('trips_tbl.trips_isArchived', '=', 'Yes')
                    ->get(['driver_tbl.driver_name', 'trips_tbl.*']);
        return view('trips', compact('archivedtrips', 'trips', 'password'));
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
        return redirect('trips');
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
    public function destroy(Request $request, $id)
    {
        if($request->password == "123"){
            $account = Trips::find($id);
            $account->delete();
            return redirect('trips');
        }
        else{
            return redirect('trips');
        }

        
    }

    public function search()
    {
        $search = $_GET['search'];
        $data = Trips::where('trips_bodynum', 'LIKE', '%' . $search . '%')->get();

        return view('trips')->with('trips', $data);
    }
}
