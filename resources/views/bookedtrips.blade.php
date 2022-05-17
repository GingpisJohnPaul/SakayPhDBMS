@extends('layouts.master')
@section('title', 'BookedTrips')
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
                            <th scope="col">Driver</th>
                            <th scope="col">Origin</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Number of Passenger</th>
                            <th scope="col">Line Code</th>
                            <th scope="col">Is Archived?</th>
                            <th scope="col">Action</th>
                            

                            <tr>
                            @foreach ($bookedtrips as $bookedtrip)
                                <td>{{$bookedtrip->reserve_id}}</td>
                                <td>{{$bookedtrip->reserve_current}}</td>
                                <td>{{$bookedtrip->reserve_destination}}</td>
                                <td>{{$bookedtrip->reserve_description}}</td>
                                <td>{{$bookedtrip->reserve_status}}</td>
                                <td>{{$bookedtrip->reserve_timestamp}}</td>

                                <td>
                                    <form method="POST" action="/driver/{{$bookedtrip->reserve_id}}">
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