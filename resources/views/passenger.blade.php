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
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<br>
</div>
<div class="p-10 bg-surface-secondary">
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6>Booked Trips</h6>
            

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
                    @for ($i = 1; $i < 4; $i++)
                        <tr>
                            <td data-label="ID"> <span>{{ $i }}</span> </td>
                            <td data-label="Origin">
                            <a class="text-heading font-semibold" href="#">Sta.Rita</a> </td>
                            <td data-label="Destination"> <span>SM Central</span> </td>
                            <td data-label="Number of Passenger"> <span>5</span> </td>
                            <td data-label="Line Code"> <span>SM</span> </td> 
                            <td data-label="Is Archived?">  <span>No</span> </td> 
                            <td data-label="Action">
                               
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