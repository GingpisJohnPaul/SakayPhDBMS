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
    </div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Number of Passenger</h5>
                        {{--<p class="card-text">{{$total}}</p>--}}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Number of Driver</h5>
                        {{--<p class="card-text">{{$total}}</p>--}}
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Number of Trips</h5>
                        {{--<p class="card-text">{{$total}}</p>--}}
                    </div>
                </div>
            </div>

            


            
                    


                            
     




  




   








         
            
        

            
            





@endsection