@extends('layouts.master')
@section('title', 'Home')
@section('content')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

{{--<div class="header">
  <h1>Welcome to Sakay.Ph</h1>
    <p>Database Management System</p>
    <img src="{{ asset('images/sakaylogo.png') }}" alt="logo" class="logo">
   </div>--}}

   <div class="header">
    <h1>Welcome to Sakay.Ph</h1>
    <p>Database Management System</p>
    <img src="{{ asset('images/sakaylogo.png') }}" alt="logo" class="logo">
    

<<<<<<< HEAD
    <form action="/home/date" method="get">
        <select name="date">
            <option value="today">Today</option>
            <option value="lastweek">Last 7 Days</option>
            <option value="lastmonth">Last 30 Days</option>
        </select>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
<div class="card">
    <div class="card-body">
=======

 
    
            <div class="dashboard">
                
>>>>>>> 809b5ad2185679a2a1b28eb21953626f89a7a498
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Number of Passenger</h5>
<<<<<<< HEAD
                        <p class="card-text">{{$totalPassenger}}</p>
=======
                         {{--<p class="card-text">{{$total}}</p>--}}
                        <p class="card-text">350<p>
>>>>>>> 809b5ad2185679a2a1b28eb21953626f89a7a498
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Number of Driver</h5>
<<<<<<< HEAD
                        <p class="card-text">{{$totalDriver}}</p>
=======
                        {{--<p class="card-text">{{$total}}</p>--}}
                        <p class="card-text">350<p>
>>>>>>> 809b5ad2185679a2a1b28eb21953626f89a7a498
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Number of Trips</h5>
<<<<<<< HEAD
                        <p class="card-text">{{$totalTrips}}</p>
=======
                        {{--<p class="card-text">{{$total}}</p>--}}
                        <p class="card-text">350<p>
>>>>>>> 809b5ad2185679a2a1b28eb21953626f89a7a498
                    </div>
                </div>
            </div>
        </div>

            


            
                    


                            
     




  




   








         
            
        

            
            





@endsection