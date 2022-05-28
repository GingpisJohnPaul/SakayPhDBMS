@extends('layouts.master')
@section('title', 'Trips')
@section('content')
<link href="{{ asset('css/trips.css') }}" rel="stylesheet">
<div class="p-10 bg-surface-secondary">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6>Driver Trips</h6>
                </div>
                <div>
                <div class="mx-auto pull-right">
                   <form action="/search-trips" method="get">
                            <input type="text" name="search">
                            <input type="submit" value="Search">
                        </form>                            
                    
               <div class="filter" >
                <form action="/trips/date" method="get">
                    <select name="date">
                        <option value="today">Today</option>
                        <option value="lastweek">Last 7 Days</option>
                        <option value="lastmonth">Last 30 Days</option>
                    </select>
                    <button type="submit" class="btn1">Filter</button>
                </form>
            </div>
                </div>
                </div>
                <br>
                
   
  
            <div class="card-content">
              
           
                <!-- Button trigger modal -->
                <button type="button" class="btn2" data-toggle="modal" data-target="#add">Add</button>
                <br>
                <br>
                <!-- Modal -->
                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Trip</h5>
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
                            <label class="form-label">Archived?</label>
                            <select name="archived">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
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
            </div>
              <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Trip</th>
                            <th scope="col">Driver Name</th>
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
                                <td>{{$trip->driver_name}}</td>
                                <td>{{$trip->trips_origin}}</td>
                                <td>{{$trip->trips_destination}}</td>
                                <td><a href="/passenger/trip/{{$trip->trips_id}}">{{$trip->trips_passenger}}</a></td>
                                <td>{{$trip->trips_bodynum}}</td>
                                <td>{{$trip->trips_isArchived}}</td>

                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$trip->trips_id}}">Edit</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="edit{{$trip->trips_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                            <select name="archived">
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
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

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$trip->trips_id}}">Delete</button>
                                    
                                    <div class="modal fade" id="delete{{$trip->trips_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Trip {{$trip->trips_id}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="POST" action="/trips/{{$trip->trips_id}}">
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
<div class="p-10 bg-surface-secondary">
    <div class="container">
         <div class="card">
             <div class="card-header">
                 <h6>Logs</h6>
                </div>
        <div class="table-responsive">
            <table class="table table-hover table-nowrap">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Trip</th>
                        <th scope="col">Driver Name</th>
                        <th scope="col">Origin</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Number of Passenger</th>
                        <th scope="col">Line Code</th>
                        <th scope="col">Is Archived?</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($archivedtrips as $archivedtrip)
                        <tr>
                            <td>{{$archivedtrip->trips_id}}</td>
                            <td>{{$archivedtrip->driver_name}}</td>
                            <td>{{$archivedtrip->trips_origin}}</td>
                            <td>{{$archivedtrip->trips_destination}}</td>
                            <td><a href="/passenger/trip/{{$archivedtrip->trips_id}}">{{$archivedtrip->trips_passenger}}</a></td>
                            <td>{{$archivedtrip->trips_bodynum}}</td>
                            <td>{{$archivedtrip->trips_isArchived}}</td>

                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$archivedtrip->trips_id}}">Edit</button>

                                <!-- Modal -->
                                <div class="modal fade" id="edit{{$archivedtrip->trips_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Booked Trip</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <form method="POST" action="/trips/{{$archivedtrip->trips_id}}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="mb-3">
                                                        <label class="form-label"> Trip Origin </label>
                                                        <input type="text" name="origin" value="{{$archivedtrip->trips_origin}}"class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"> Destination </label>
                                                        <input type="text" name="destination" value="{{$archivedtrip->trips_destination}}" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"> No. of Passengers </label>
                                                        <input type="text" name="passengers" value="{{$archivedtrip->trips_passenger}}" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"> Line Code </label>
                                                        <input type="text" name="linecode" value="{{$archivedtrip->trips_bodynum}}" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"> Archived? </label>
                                                        <select name="archived">
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
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

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$archivedtrip->trips_id}}">Delete</button>
                                
                                <div class="modal fade" id="delete{{$archivedtrip->trips_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Trip {{$trip->trips_id}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <form method="POST" action="/trips/{{$archivedtrip->trips_id}}">
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





    
@endsection