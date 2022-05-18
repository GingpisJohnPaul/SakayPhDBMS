@extends('layouts.master')
@section('title', 'Trips')
@section('content')
<div class="p-10 bg-surface-secondary">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6>trip Trips</h6>
                </div>
                <div>
                <div class="mx-auto pull-right">
                    <div class="input-group">
                        <form action="/search-trips" method="get">
                            <input type="text" name="search">
                            <input type="submit" value="Search">
                        </form>                            
                    </div>
                </form>
                </div>
                </div>
                </div>
    <div class="p-10 bg-surface-secondary">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6>Trips</h6>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">Add</button>
                <!-- Modal -->
                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="/trips" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label"> Driver ID </label>
                            <input type="text" name="driver" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Origin </label>
                            <input type="text" name="origin" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Destination </label>
                            <input type="text" name="destination" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> No. of Passengers </label>
                            <input type="text" name="passengers" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Line Code </label>
                            <input type="text" name="linecode" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Archived? </label>
                            <input type="text" name="archived" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
                </div>

            </div>
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Trip</th>
                            <th scope="col">Driver</th>
                            <th scope="col">Origin</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Number of Passenger</th>
                            <th scope="col">Line Code</th>
                            <th scope="col">Is Archived?</th>
                            <th scope="col">Action</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trips as $trip)
                            <tr>
                                <td>{{$trip->trips_id}}</td>
                                <td>{{$trip->driver_id}}</td>
                                <td>{{$trip->trips_origin}}</td>
                                <td>{{$trip->trips_destination}}</td>
                                <td>{{$trip->trips_passenger}}</td>
                                <td>{{$trip->trips_bodynum}}</td>
                                <td>{{$trip->trips_isArchived}}</td>

                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$trip->trips_id}}">Edit</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{$trip->trips_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Booked Trip</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="POST" action="/trips/{{$trip->trips_id}}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="mb-3">
                                                            <label class="form-label"> Trip Origin </label>
                                                            <input type="text" name="origin" value="{{$trip->trips_origin}}"class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"> Destination </label>
                                                            <input type="text" name="destination" value="{{$trip->trips_destination}}" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"> No. of Passengers </label>
                                                            <input type="text" name="passengers" value="{{$trip->trips_passenger}}" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"> Line Code </label>
                                                            <input type="text" name="linecode" value="{{$trip->trips_bodynum}}" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"> Archived? </label>
                                                            <input type="text" name="archived" value="{{$trip->trips_isArchived}}" class="form-control">
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
                                    <form method="POST" action="/trip/{{$trip->trips_id}}">
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