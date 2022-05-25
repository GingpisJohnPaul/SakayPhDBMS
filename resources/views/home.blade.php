@extends('layouts.master')
@section('title', 'Home')
@section('content')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

<div class="header">
  
    <h1>Welcome to Sakay.Ph</h1>
    <p>Database Management System</p>
    <img src="{{ asset('images/sakaylogo.png') }}" alt="logo" class="logo">
   
</div>

<div class="content">
    <h2>What is Sakay.Ph DBMS?</h2>
    <p>Sakay.Ph DBMS allows passengers and drivers to create,read,update, and delete data in the database.DBMS manage the data, the database engine, and the database schema, 
       allowing for data to be manipulated or extracted by users and other programs. Securing the data is easy. The administrator can
       restrict the usage of the database to a few people only. 
    </p>
</div>
@endsection