@extends('layouts.master')

@section('title')
REMS-Reserve
@endsection



@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div class="p-2 bd-highlight">
                    <a class="btn btn-primary" href="/reserve"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                
                <div class="">
                    <form class="form-inline my-2 my-lg-0" type="get" action={{ url('/reservesearch') }}>
                        <input class="form-control mr-sm-2" type="text" name="search-query-reserve" placeholder="Search">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <table class="table table-light table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Employee Id</th>
                        <th>Reserved Equipment</th>
                        <th>Quantity</th>
                        <th>Reserved Room</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>ReservedBy_SA_ID</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count ($searchQuery) > 0)
                    @foreach($searchQuery as $search)  
                        <tr>
                            <td>{{$search->employee_id}}</td>
                            <td>{{$search->eq_r_id}}</td>
                            <td>{{$search->quantity}}</td>
                            <td>{{$search->room_id}}</td>
                            <td>{{$search->start}}</td>
                            <td>{{$search->end}}</td>
                            <td>{{$search->ReservedBy_SA_ID}}</td>
                            @if($search->status == 1)
                            <td>Reserved</td>
                            <td>
                                <a href="/reserve/{{$search -> id}}/edit" class = "btn btn-primary"><i class="far fa-edit"></i></a>
                                <a href="/reserve/{{$search -> id}}" class = "btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                            @else
                            <td>Cancelled</td>
                            <td>
                                <a href="/reserve/{{$search -> id}}" class = "btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                            @endif
                         {{--    <td>{{$search->status}}</td> --}}
                        
                        </tr>
                    @endforeach
                    @else
                    <div class="alert alert-info" role="alert">
                        <i class="fas fa-info"></i>
                        No <strong>reservations</strong> found  
                    </div>
                    @endif
                </tbody>
            </table>
            {{ $searchQuery->links() }}
        </div>
    </div>
       
</div>

@endsection