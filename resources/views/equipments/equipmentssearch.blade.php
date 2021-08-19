@extends('layouts.master')

@section('title') 
REMS-Equipement
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div class="p-2 bd-highlight">
                    <a class="btn btn-primary" href="/equipments"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                
                <div class="">
                    <form class="form-inline my-2 my-lg-0" type="get" action={{ url('/equipmentssearch') }}>
                        <input class="form-control mr-sm-2" type="text" name="search-query-equipments" placeholder="Search">
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
                            <th>Equipment Id</th>
                            <th>Equipment Name</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count ($searchQuery) > 0)
                        @foreach($searchQuery as $search)  
                            <tr>
                                <td>{{$search->equipment_id}}</td>
                                <td>{{$search->equipmentName}}</td>
                                <td>{{$search->quantity}}</td>
                                <td>
                                    <a href="/equipments/{{$search -> id}}/edit" class = "btn btn-primary">Edit</a>
                                    <a href="/equipments/{{$search -> id}}" class = "btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <div class="alert alert-info" role="alert">
                            <i class="fas fa-info"></i>
                            No <strong>equipments</strong> found 
                        </div>
                        @endif
                    </tbody>
                </table>
                {{-- {{$equipmentQuery -> links()}} --}}
            </div>
        </div>
        </div>
        

   
{{-- <div class="container">
    <div class="row">
        <div class="col-md-2">
            <table class="table table-dark table-borderless">
                <thead class="thead-clear text-center">
                    <tr>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody style ="text-align: center">
                        <tr>
                            <td><button type="button" id="btnAdd" class="btn btn-primary" btn-lg btn-block">Add Equipment</button></td>
                        </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-10">
            <table class="table table-light table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Equipment Id</th>
                        <th>Equipment Name</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipmentQuery as $equipment)
                        <tr id="record_id_{{$equipment->id}}">
                            <td>{{$equipment->equipmentId}}</td>
                            <td>{{$equipment->equipmentName}}</td>
                            <td>{{$equipment->quantity}}</td>
                            <td>
                                <button type="button" id="btnEdit" class="btn btn-primary" btn-lg btn-block" data-id="{{$equipment->id}}">Edit</button>
                                <button type="button" id="btnDelete" class="btn btn-danger" btn-lg btn-block" data-id="{{$equipment->id}}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
            <!-- Modal -->
            <div class="modal fade" id="addUpdateModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="headerAddUpdateModal"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <form id="addUpdateForm">
                                <div class="form-group">
                                  <input type="text" name="id" id="id" class="form-control" hidden>
                                </div>
                                <div class="form-group">
                                    <label>Equipment Id</label>
                                    <input type="text" class="form-control" name="equipmentId" id="equipmentId" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Equipment Name</label>
                                    <input type="text" class="form-control" name="equipmentName" id="equipmentName" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" class="form-control" name="quantity" id="quantity" value=1 >
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btnSave">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div> --}}
   

@endsection