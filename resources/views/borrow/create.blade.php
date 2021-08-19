@extends('layouts.master')

@section('title')
REMS-Borrow
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">

                <div class="p-2 bd-highlight">
                    <a href="/borrow" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div> 
        
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">

                <div class="p-2 bd-highlight">
                    <h4 class="font-weight-bold mb-0">Borrow</h4>
                </div>
            </div>
        </div> 
        
    </div>

    <div class="row">
        <div class="container">
            <div class="col-md-12">
                {{-- laravelCollective coding style--}}
                {!! Form::open(['action' => 'BorrowController@store', 'method' => 'POST'])!!}
        {{--            <div class="form-group" >
                    {{Form::label('reserve', 'Reservation')}}
                    {!!Form::select('status', ['3'=> 'Equipment and Room', '2' => 'Equipment', '1' => 'Room'], null, [ 'class' => 'form-control', 'placeholder' => '-SELECT-', 'id' => 'showFields'])!!}
                </div> --}}
                <div class="form-group">
                    {{Form::label('employee_id', 'Employee Id')}}
                    {{Form::select('employee_id', $employee, '', ['class' => 'form-control', 'name' => 'employee_id', 'placeholder' => '-SELECT-'])}}
                </div>
                <div class="form-group">
                    {{Form::label('student_id', 'Student Id')}}
                    {{Form::select('student_id', $student, '', ['class' => 'form-control', 'name' => 'student_id', 'placeholder' => '-SELECT-'])}}
                </div>
                <div class="form-group" id="eq_r_idField">
                    {{Form::label('equipment_id', 'Equipment')}}
                    {!!Form::select('eq_b_id', $equipments, '', ['class' => 'form-control ', 'name' => 'eq_b_id', 'placeholder' => '-SELECT-']) !!}
                </div>
                <div class="form-group" id="quantityField">
                    {{Form::label('quantity', 'Quantity')}}
                    {{Form::number('quantity', '', [ 'class' => 'form-control', 'value = 1', 'name' => 'quantity' ])}}
                </div>
    {{--             <div class="form-group" id="roomField">
                    {{Form::label('room_id', 'Room')}}
                    {!!Form::select('room_id', $rooms, '', ['class' => 'form-control ', 'name' => 'room_id', 'placeholder' => '-SELECT-']) !!}
                </div> --}}
                <div class="form-group">
                    {{-- {{Form::label('ReservedBy_SA_ID', 'Reserved By(Id)')}} --}}
                    {{Form::hidden('ReleasedBy_SA_ID', '', [ 'class' => 'form-control', 'name' => 'ReleasedBy_SA_ID' ])}}
                </div>
                <div class="form-group">
                    {{Form::label('start', 'Start Date')}}
                    {{Form::text('start', '', ['class' => 'form-control', 'placeholder' => '', 'name' => 'start', 'id' => 'date-start'])}}
                </div>
    {{--             <div class="form-group">
                    {{Form::label('end', 'End Date')}}
                    {{Form::text('end', '', ['class' => 'form-control', 'placeholder' => '', 'name' => 'end', 'id' => 'date-end'])}}
                </div> --}}
                <div class="form-group">
                    {{-- {{Form::label('RecievedBy_SA_ID', 'Recieved By(Id)')}} --}}
                    {{Form::hidden('RecievedBy_SA_ID', '', ['class' => 'form-control', 'name' => 'RecievedBy_SA_ID'])}}
                </div>
                <div class="form-group">
                    {{Form::label('status', 'Status')}}
                    {!!Form::select('status', ['1'=>'Borrowed', '0' => 'Cancelled'], null, [ 'class' => 'form-control'])!!}
                </div>
                <hr>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@include('borrow/borrow_script')
@endsection