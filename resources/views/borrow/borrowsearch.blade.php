@extends('layouts.master')

@section('title') 
REMS-Borrow
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a class="btn btn-primary" href="/borrow"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                
                <div>
                    <form class="form-inline my-2 my-lg-0" type="get" action={{ url('/borrowsearch') }}>
                        <input class="form-control mr-sm-2" type="text" name="search-query-borrow" placeholder="Search Id">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-light table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Employee Id</th>
                        <th>Student Id</th>
                        <th>Borrowed Equipment</th>
                        <th>Quantity</th>
                        <th>Start</th>
                        <th>Released By</th>
                        <th>End</th>
                        <th>Received By</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count ($searchQuery) > 0)
                    @foreach($searchQuery as $search)  
                        <tr>
                            <td>{{$search->employee_id}}</td>
                            <td>{{$search->student_id}}</td>
                            <td>{{$search->eq_b_id}}</td>
                            <td>{{$search->quantity}}</td>
                            <td>{{$search->start}}</td>
                            <td>{{$search->ReleasedBy_SA_ID}}</td>
                            <td>{{$search->end}}</td>
                            <td>{{$search->RecievedBy_SA_ID}}</td>
                            <td>{{$search->status}}</td>
                            <td>
                                <a href="/borrow/{{$search -> id}}/edit" class = "btn btn-primary">Edit</a>
                                <a href="/borrow/{{$search -> id}}" class = "btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <div class="alert alert-info" role="alert">
                        <i class="fas fa-info"></i>
                        No <strong>items borrowed</strong>  
                    </div>
                    @endif
                </tbody>
            </table>
            {{ $searchQuery->links() }}
        </div>
    </div>
    
    </div>
</div>


   
@endsection