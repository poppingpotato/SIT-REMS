@extends('layouts.master')

@section('title') 
REMS-User Transaction
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">

                <div class="p-2 bd-highlight">
                    <h4 class="font-weight-bold mb-0">{{auth()->user()->firstName}} Transactions</h4>
                </div>
            </div>
            <hr>
        </div>
    </div>

{{--     <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-start align-items-center">

                <div class="p-2 bd-highlight">
                    <a class="btn btn-primary" href="/borrow/create">Borrow</a>
                </div>

                <div class="p-2 bd-highlight">
                   <form class="form-inline my-2 my-lg-0" type="get" action={{ url('/borrowdata') }}>
                        <div class="input-group">
                            <div class="input-group-prepend">
                        
                                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><i class="far fa-file-pdf"></i> PDF</button>
                            </div>
                        <input type="text" class="form-control" placeholder="MM\DD\YYYY" name="filter-query-borrow">
                        </div>
                   </form>

                </div>
                
                  <a class="btn btn-success" href="/borrowdata">Generate PDF <i class="far fa-file-pdf"></i></a>
                
                <div class="ml-auto p-2 bd-highlight"> 
                    <form class="form-inline my-2 my-lg-0" type="get" action={{ url('/borrowsearch') }}>
                        <input class="form-control mr-sm-2" type="text" name="search-query-borrow" placeholder="Search Id">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
     --}}
    <div class="row">
        <div class="p-2 bd-highlight">
            <h4 class="font-weight-bold mb-0">Borrow Transactions</h4>
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
                        <th>Recieved By</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count ($BorrowQuery) > 0)
                    @foreach($BorrowQuery as $borrow)  
                        <tr>
                            <td>{{$borrow->employee_id}}</td>
                            <td>{{$borrow->student_id}}</td>
                            <td>{{$borrow->equipment->equipmentName}}</td>
                            <td>{{$borrow->quantity}}</td>
                            <td>{{$borrow->start}}</td>
                            <td>{{$borrow->user1->firstName}}</td>
                            <td>{{$borrow->end}}</td>

                            @if($borrow->user2 == "")
                            <td></td>
                            @else 
                                <td>{{$borrow->user2->firstName}}</td>
                            @endif
                           
                            @if($borrow->status == 1)
                            <td>Borrowed</td>
                            <td>
                                <a href="/borrow/{{$borrow -> id}}/edit" class = "btn btn-primary"><i class="far fa-edit"></i></a>
                                <a href="/borrow/{{$borrow -> id}}" class = "btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                            @else 
                                <td>Returned</td>
                                <td>
                                    <a href="/borrow/{{$borrow -> id}}" class = "btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            @endif
                           {{--  <td>{{$borrow->status}}</td> --}}
                           
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
            {{ $BorrowQuery->links() }}
        </div>
    </div>
    <div class="row">
        <div class="p-2 bd-highlight">
            <h4 class="font-weight-bold mb-0">Reservation Transactions</h4>
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

    @include('borrow/borrow_script')
@endsection