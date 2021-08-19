@extends('layouts.master')

@section('title')
REMS-Reserve
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">

            <div class="p-2 bd-highlight">
                <a href="/borrow" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
            </div>

            <div class="p-2 bd-highlight">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="far fa-trash-alt"></i></button>
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
                        <th>Recieved By</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$BorrowQuery->employee_id}}</td>
                        <td>{{$BorrowQuery->student_id}}</td>
                        <td>{{$BorrowQuery->eq_b_id}}</td>
                        <td>{{$BorrowQuery->quantity}}</td>
                        <td>{{$BorrowQuery->start}}</td>
                        <td>{{$BorrowQuery->ReleasedBy_SA_ID}}</td>
                        <td>{{$BorrowQuery->end}}</td>
                        <td>{{$BorrowQuery->RecievedBy_SA_ID}}</td>
                        @if($BorrowQuery->status == 1)
                            <td>Borrowed</td>
                        @else 
                            <td>Returned</td>
                        @endif
                    </tr>
                </tbody>
            </table>
            <hr>
              
                
        </div>
    </div>
    
   
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="delete_modal">Delete Item?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            Are you sure?
            </div>
            <div class="modal-footer">
            {!!Form::open(['action' => ['BorrowController@destroy', $BorrowQuery-> id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            </div>
        </div>
    </div>

@endsection