@extends('layouts.master')
@section('title', 'Driver')
@section('content')
<div class="p-10 bg-surface-secondary">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6>Driver</h6>
                </div>
                <div>
                <div class="mx-auto pull-right">
                    <div class="input-group">
                        <form action="/search-drivers" method="get">
                            <input type="text" name="search">
                            <input type="submit" value="Search">
                        </form>                            
                    </div>
                </form>
                </div>
                </div>
                </div>

            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Username</th>
                            <th scope="col">Address</th>
                            <!-- 
                            <th scope="col">Password</th>
                            
                            
                            <th scope="col">Action</th> -->
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($drivers as $driver)
                        <tr>
                            <td>{{$driver->driver_id}}</td>
                            <td>{{$driver->driver_name}}</td>
                            <td>{{$driver->driver_contact}}</td>
                            <td>{{$driver->driver_uname}}</td>
                            <td>{{$driver->driver_address}}</td>

                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$driver->driver_id}}">Edit</button>

                                <!-- Modal -->
                                <div class="modal fade" id="{{$driver->driver_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Booked Trip</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <form method="POST" action="/driver/{{$driver->driver_id}}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="mb-3">
                                                        <label class="form-label"> Driver Name </label>
                                                        <input type="text" name="name" value="{{$driver->driver_name}}"class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"> Contact Number </label>
                                                        <input type="text" name="contact" value="{{$driver->driver_contact}}" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"> Username </label>
                                                        <input type="text" name="username" value="{{$driver->driver_uname}}" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"> Address </label>
                                                        <input type="text" name="address" value="{{$driver->driver_address}}" class="form-control">
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


                                <!-- <button class="btn btn- btn-sm" href="/driver/{{$driver->driver_id}}">View</button> -->
                                <form method="POST" action="/driver/{{$driver->driver_id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>




    
@endsection