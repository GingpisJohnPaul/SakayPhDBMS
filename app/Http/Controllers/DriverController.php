<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $driver = Driver::all();
        return view('driver')->with('drivers', $driver);
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
        //
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
        $updatedDriver = Driver::find($id);
        $updatedDriver->driver_name = $request->name;
        $updatedDriver->driver_contact = $request->contact;
        $updatedDriver->driver_uname = $request->username;
        $updatedDriver->driver_address = $request->address;
        $updatedDriver->fill($request->all());
        $updatedDriver->save();

        return redirect('driver');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Driver::find($id);
        $account->delete();

        return redirect('driver');
    }

    public function search()
    {
        $search = $_GET['search'];
        $data = Driver::where('driver_name', 'LIKE', '%' . $search . '%')->get();

        return view('driver')->with('drivers', $data);
    }
}
