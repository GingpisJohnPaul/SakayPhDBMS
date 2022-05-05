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
                            <th scope="col">Password</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @for ($i = 0; $i < 10; $i++)
                            <tr>
                                <td data-label="ID"> <span>{{ $i }}</span> </td>
                                <td data-label="Name">
                                <a class="text-heading font-semibold" href="#"> Robert Fox </a> </td>
                                <td data-label="Username"> <span>Kamote</span> </td>
                                <td data-label="Password"> <span>12345</span> </td>
                                <td data-label="ContactNumber"> <span>09123456789</span> </td>
                                <td data-label="Address"> <span>123 Fake St. San Juan City</span> </td>
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