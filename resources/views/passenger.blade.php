@extends('layouts.master')
@section('title', 'Passenger')
@section('content')
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
                            <button class="btn btn-info" type="submit" title="Search">
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
                            <th scope="col">Username</th>
                            <th scope="col">Contact Number</th>
                            <!-- <th scope="col">Password</th> -->
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($passenger as $item)
                        <tr>
                            <td>{{$item->users_id}}</td>
                            <td>{{$item->users_name}}</td>
                            <td>{{$item->users_uname}}</td>
                            <td>{{$item->users_contact}}</td>
                            <td>{{$item->users_address}}</td>

                            <td>
                                <form method="POST" action="/passenger/{{$item->users_id}}">
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
</div>

    
@endsection