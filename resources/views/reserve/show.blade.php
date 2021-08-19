@extends('layouts.master')

@section('title')
REMS-Reserve
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">

            <div class="p-2 bd-highlight">
                <a href="/reserve" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
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
                    <th>Reserved Equipment</th>
                    <th>Quantity</th>
                    <th>Reserved Room</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>ReservedBy_SA_ID</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$ReserveQuery->employee_id}}</td>
                    <td>{{$ReserveQuery->eq_r_id}}</td>
                    <td>{{$ReserveQuery->quantity}}</td>
                    <td>{{$ReserveQuery->room_id}}</td>
                    <td>{{$ReserveQuery->start}}</td>
                    <td>{{$ReserveQuery->end}}</td>
                    <td>{{$ReserveQuery->ReservedBy_SA_ID}}</td>
                    <td>{{$ReserveQuery->status}}</td>
                </tr>
            </tbody>
        </table>
        <hr>
            
            
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
        {!!Form::open(['action' => ['ReserveController@destroy', $ReserveQuery-> id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        </div>
    </div>
</div>

@endsection