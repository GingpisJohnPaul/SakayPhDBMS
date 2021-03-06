<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookedTrips;

class BookedTripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $search = BookedTrips::where([
        //     ['search', '!=', Null],
        //     [function ($query) use ($request){
        //         if (($searchcurrent = $request->$searchcurrent)){
        //             $query->orWhere('reserve_current', 'LIKE', '%' . $searchcurrent . '%')->get();
        //         }
        //     }]
        // ]);

        // $search = BookedTrips::query();
        // if (request('search')){
        //     $search->orWhere('reserve_current', 'LIKE', '%' . request('search') . '%');
        // }

        $bookedtrips = BookedTrips::all();
        // error_log("$search");
        return view('bookedtrips')->with('bookedtrips', $bookedtrips);
        

        // return $search;
    }

    public function search()
    {
        $search = $_GET['search'];
        $data = BookedTrips::where('reserve_current', 'LIKE', '%' . $search . '%')->get();

        return view('bookedtrips')->with('bookedtrips', $data);
    }
    // 'OR', 'reserve_destination', 'OR', 'reserve_description', 'OR', 'reserve_status', 'OR', 'reserve_timestamp',
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
        $bookedtrip = new BookedTrips;

        $bookedtrip->trips_id = $request->trip;
        $bookedtrip->users_id = $request->user;
        $bookedtrip->reserve_current = $request->current;
        $bookedtrip->reserve_destination = $request->destination;
        $bookedtrip->reserve_description = $request->description;
        $bookedtrip->reserve_status = $request->status;

        $bookedtrip->save();

        $bookedtrips = BookedTrips::all();
        return view('bookedtrips')->with('bookedtrips', $bookedtrips);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $post = Post::find($id);
        // // dd($post);
        // return view('admin.post.show')->with('post',$post);
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
        $updatedTrip = BookedTrips::find($id);
        $updatedTrip->trips_id = $request->trip;
        $updatedTrip->users_id = $request->user;
        $updatedTrip->reserve_current = $request->current;
        $updatedTrip->reserve_destination = $request->destination;
        $updatedTrip->reserve_description = $request->description;
        $updatedTrip->reserve_status = $request->status;
        $updatedTrip->fill($request->all());
        $updatedTrip->save();

        return redirect('bookedtrips');
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
            $account = BookedTrips::find($id);
            $account->delete();

            return redirect('bookedtrips');
        }
        else{
            return redirect('passenger');
        }
        
        
    }


}
