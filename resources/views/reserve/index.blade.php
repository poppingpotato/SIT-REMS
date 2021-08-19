@extends('layouts.master')

@section('title')
REMS-Reserve
@endsection



@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div class="p-2 bd-highlight">
                    <h4 class="font-weight-bold mb-0">Reserve</h4>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">

                <div class="p-2 bd-highlight">
                    <a class="btn btn-primary" href="/reserve/create">Reserve</a>
                </div>
                
                <div class="p-2 bd-highlight">
                    <form class="form-inline my-2 my-lg-0" type="get" action={{ url('/reservedata') }}>
                         <div class="input-group">
                             <div class="input-group-prepend">
                         
                                 <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><i class="far fa-file-pdf"></i> PDF</button>
                             </div>
                         <input type="text" class="form-control" placeholder="MM\DD\YYYY" name="filter-query-reserve">
                         </div>
                    </form>
 
                 </div>

{{--                 <div class="p-2 bd-highlight">
                    <a class="btn btn-success" href="/reservedata-pdf">Generate PDF <i class="far fa-file-pdf"></i></a>
                </div> --}}

                <div class="ml-auto p-2 bd-highlight">
                    <form class="form-inline my-2 my-lg-0"  type="get" action={{ url('/reservesearch') }}>
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
                    @if(count ($ReserveQuery) > 0)
                    @foreach($ReserveQuery as $reserve)  
                        <tr>
                            <td>{{$reserve->employee_id}}</td>
                            @if($reserve->equipment == "")
                            <td></td>
                            @else 
                            <td>{{$reserve->equipment->equipmentName}}</td>
                            @endif
                       
                            <td>{{$reserve->quantity}}</td>
                            <td>{{$reserve->room_id}}</td>
                            <td>{{$reserve->start}}</td>
                            <td>{{$reserve->end}}</td>
                            <td>{{$reserve->user->firstName}}</td>
                            @if($reserve->status == 1)
                            <td>Reserved</td>
                            <td>
                                <a href="/reserve/{{$reserve -> id}}/edit" class = "btn btn-primary"><i class="far fa-edit"></i></a>
                                <a href="/reserve/{{$reserve -> id}}" class = "btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                            @else
                            <td>Cancelled</td>
                            <td>
                                <a href="/reserve/{{$reserve -> id}}" class = "btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                            @endif
                            {{-- <td>{{$reserve->status}}</td> --}}
                          
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
            {{ $ReserveQuery -> links() }}
        </div>
    </div>

@endsection