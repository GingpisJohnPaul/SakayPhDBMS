@extends('layouts.master')
@section('title', 'Passenger')
@section('content')
<link href="{{ asset('css/passenger.css') }}" rel="stylesheet">
<div class="p-10 bg-surface-secondary">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6>Passenger</h6>
                </div>
                <div>
                    <div class="mx-auto pull-right">
                        <div class="">
                            <div class="input-group">
                                <form action="/search-passengers" method="get">
                                    <input type="text" name="search">
                                    <input type="submit" value="Search">
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Contact Number</th>
                            <!-- <th scope="col">Password</th> -->
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($passengers as $passenger)
                        <tr>
                            <td>{{$passenger->users_id}}</td>
                            <td>{{$passenger->users_name}}</td>
                            <td>{{$passenger->users_uname}}</td>
                            <td>{{$passenger->users_contact}}</td>
                            <td>{{$passenger->users_address}}</td>

                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$passenger->users_id}}">Edit</button>

                                <!-- Modal -->
                                <div class="modal fade" id="{{$passenger->users_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Booked Trip</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form method="POST" action="/passenger/{{$passenger->users_id}}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-3">
                                            <label class="form-label"> Passenger Name </label>
                                            <input type="text" name="name" value="{{$passenger->users_name}}"class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"> Username </label>
                                            <input type="text" name="username" value="{{$passenger->users_uname}}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"> Contact Number </label>
                                            <input type="text" name="contact" value="{{$passenger->users_contact}}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"> Address </label>
                                            <input type="text" name="address" value="{{$passenger->users_address}}" class="form-control">
                                        </div>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                    </div>
                                    
                                    </div>
                                </div>
                                </div>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$passenger->users_id}}">Delete</button>
                                    
                                    <div class="modal fade" id="delete{{$passenger->users_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Passenger: {{$passenger->users_name}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="POST" action="/passenger/{{$passenger->users_id}}">
                                                        <div class="mb-3">
                                                            <label class="form-label"> Confirm Password </label>
                                                            <input type="text" name="password" class="form-control" required>
                                                        </div>
                                                </div>
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br>
<br>
</div>

    
@endsection