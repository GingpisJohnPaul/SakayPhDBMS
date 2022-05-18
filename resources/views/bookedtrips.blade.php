@extends('layouts.master')
@section('title', 'BookedTrips')
@section('content')
<div class="p-10 bg-surface-secondary">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6>Passenger Booked Trips</h6>
                </div>
                <div>
                <div class="mx-auto pull-right">
                    <div class="">
                        <div class="input-group">
                        <form action="/search" method="get">
                            <!-- <input type="text" class="form-control" name="search" id="search" placeholder="Search for a record">
                            <button class="btn btn-info" type="submit" title="Search projects">Search</button> -->
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
                    <form action="/bookedtrips" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label"> Trip ID </label>
                            <input type="text" name="trip" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Passenger ID </label>
                            <input type="text" name="user" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Current </label>
                            <input type="text" name="current" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Destination </label>
                            <input type="text" name="destination" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Description </label>
                            <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Status </label>
                            <select name="status">
                                <option value="Approved">Approved</option>
                                <option value="Pending">Pending</option>
                            </select>
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
                            <th scope="col">ID</th>
                            <th scope="col">Trip ID</th>
                            <th scope="col">Current</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Timestamp</th>
                            <th scope="col">Action</th>
                            

                            <tr>
                            @foreach ($bookedtrips as $bookedtrip)
                                <td>{{$bookedtrip->reserve_id}}</td>
                                <td>{{$bookedtrip->trips_id}}</td>
                                <td>{{$bookedtrip->reserve_current}}</td>
                                <td>{{$bookedtrip->reserve_destination}}</td>
                                <td>{{$bookedtrip->reserve_description}}</td>
                                <td>{{$bookedtrip->reserve_status}}</td>
                                <td>{{$bookedtrip->reserve_timestamp}}</td>

                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" onclick="" data-toggle="modal" data-target="#{{$bookedtrip->reserve_id}}">Edit</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{$bookedtrip->reserve_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Booked Trip</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form method="POST" action="/bookedtrips/{{$bookedtrip->reserve_id}}">
                                            @csrf
                                            @method('PATCH')
                                            <div class="mb-3">
                                                <label class="form-label"> Trip ID </label>
                                                <input type="text" name="trip" value="{{$bookedtrip->trips_id}}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"> Passenger ID </label>
                                                <input type="text" name="user" value="{{$bookedtrip->users_id}}"class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"> Current </label>
                                                <input type="text" name="current" value="{{$bookedtrip->reserve_current}}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"> Destination </label>
                                                <input type="text" name="destination" value="{{$bookedtrip->reserve_destination}}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"> Description </label>
                                                <textarea name="description" class="form-control" cols="30" rows="5">{{$bookedtrip->reserve_description}}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"> Status </label>
                                                <select name="status">
                                                    <option value="Approved">Approved</option>
                                                    <option value="Pending">Pending</option>
                                                </select>
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
                                        

                                    <form method="POST" action="/bookedtrips/{{$bookedtrip->reserve_id}}">
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