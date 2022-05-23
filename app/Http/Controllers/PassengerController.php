<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passenger = Users::all();
        return view('passenger')->with('passengers', $passenger);
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
        $updatedPassenger = Users::find($id);
        $updatedPassenger->users_name = $request->name;
        $updatedPassenger->users_uname = $request->username;
        $updatedPassenger->users_contact = $request->contact;
        $updatedPassenger->users_address = $request->address;
        $updatedPassenger->fill($request->all());
        $updatedPassenger->save();

        return redirect('passenger');
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
            $account = Users::find($id);
            $account->delete();
            return redirect('passenger');
        }
        else{
            return redirect('passenger');
        }
    }

    public function search()
    {
        $search = $_GET['search'];
        $data = Users::where('users_name', 'LIKE', '%' . $search . '%')->get();

        return view('passenger')->with('passengers', $data);
    }
}
