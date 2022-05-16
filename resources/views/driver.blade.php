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
                    <div class="">
                        <div class="input-group">
                        <button class="btn btn-info" type="submit" title="Search projects">
                        </button>
                        </span>
                <input type="text" class="form-control" name="search" placeholder="Search">
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
                        @foreach ($driver as $item)
                        <tr>
                            <td>{{$item->driver_id}}</td>
                            <td>{{$item->driver_name}}</td>
                            <td>{{$item->driver_contact}}</td>
                            <td>{{$item->driver_uname}}</td>
                            <td>{{$item->driver_address}}</td>

                            <td>
                                <form method="POST" action="/driver/{{$item->driver_id}}">
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
<br>
<br>
    <div class="p-10 bg-surface-secondary">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6>Trips</h6>
                <a href="#" class="btn btn-sm btn-primary">Add</a>

            </div>
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Origin</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Number of Passenger</th>
                            <th scope="col">Line Code</th>
                            <th scope="col">Is Archived?</th>
                            <th scope="col">Action</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i < 6; $i++)
                            <tr>
                                <td data-label="ID"> <span>{{ $i }}</span> </td>
                                <td data-label="Origin">
                                <a class="text-heading font-semibold" href="#">Sta.Rita</a> </td>
                                <td data-label="Destination"> <span>SM Central</span> </td>
                                <td data-label="Number of Passenger"> <span>5</span> </td>
                                <td data-label="Line Code"> <span>SM</span> </td> 
                                <td data-label="Is Archived?">  <span>No</span> </td> 
                                <td data-label="Action">
                                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    
@endsection