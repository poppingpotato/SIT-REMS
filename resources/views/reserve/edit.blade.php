@extends('layouts.master')

@section('title')
REMS-Edit-Reserve
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
            <div class="p-2 bd-highlight">
                <a href="/reserve" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
            </div>

        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
            <div class="p-2 bd-highlight">
                <h4 class="font-weight-bold mb-0">Reserve</h4>
            </div>

        </div>
    </div>

</div>
<div class="row">
    <div class="container">
        <div class="col-md-12">
            {{-- laravelCollective coding style--}}
            {!! Form::open(['action' => ['ReserveController@update', $ReserveQuery->id], 'method' => 'POST'])!!}
            <div class="form-group" >
                {{Form::label('reserve', 'Reservation')}}
                {!!Form::select('reserve', ['3'=> 'Equipment and Room', '2' => 'Equipment', '1' => 'Room'], null, [ 'class' => 'form-control', 'placeholder' => '-SELECT-', 'id' => 'showFields'])!!}
            </div>
            <div class="form-group">
                {{Form::label('employee_id', 'Employee Id')}}
                {{Form::text('employee_id', $ReserveQuery->employee_id, ['class' => 'form-control', 'placeholder' => '', 'name' => 'employee_id'])}}
            </div>
            <div class="form-group">
                {{Form::label('equipment_id', 'Equipment')}}
                {!!Form::select('eq_r_id', $equipments, $ReserveQuery->eq_r_id, ['class' => 'form-control ', 'name' => 'eq_r_id', 'placeholder' => '-SELECT-']) !!}
            </div>
            <div class="form-group">
                {{Form::label('eq_quantity', 'Quantity')}}
                {{Form::number('quantity', $ReserveQuery->quantity, [ 'class' => 'form-control', 'value = 1', 'name' => 'quantity' ])}}
            </div>
            <div class="form-group">
                {{Form::label('room_id', 'Room')}}
                {!!Form::select('room_id', $rooms, $ReserveQuery->room_id, ['class' => 'form-control ', 'name' => 'room_id', 'placeholder' => '-SELECT-']) !!}
            </div>
            <div class="form-group">
                {{-- {{Form::label('ReservedBy_SA_ID', 'Reserved By(Id)')}} --}}
                {{Form::hidden('ReservedBy_SA_ID', $ReserveQuery->ReservedBy_SA_ID, [ 'class' => 'form-control', 'name' => 'ReservedBy_SA_ID' ])}}
            </div>
            <div class="form-group">
                {{Form::label('start', 'Start Date')}}
                {{Form::text('start', $ReserveQuery->start, ['class' => 'form-control', 'placeholder' => '', 'name' => 'start', 'id' => 'date-start'])}}
            </div>
            <div class="form-group">
                {{Form::label('end', 'End Date')}}
                {{Form::text('end', $ReserveQuery->end, ['class' => 'form-control', 'placeholder' => '', 'name' => 'end', 'id' => 'date-end'])}}
            </div>
            <div class="form-group">
                {{Form::label('status', 'Status')}}
                {!!Form::select('status', ['1' => 'Reserved', '0' => 'Cancelled'], $ReserveQuery->status, [ 'class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                {{-- {{Form::label('RecievedBy_SA_ID', 'Recieved By(Id)')}} --}}
                {{-- {{Form::hidden('RecievedBy_SA_ID', '', ['class' => 'form-control', 'name' => 'RecievedBy_SA_ID'])}} --}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@include('reserve/reserve_script')
@endsection