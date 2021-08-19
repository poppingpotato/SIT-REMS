@extends('layouts.master')

@section('title') 
REMS-Equipments
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">

                <div class="p-2 bd-highlight">
                    <h4 class="font-weight-bold mb-0">Equipments</h4>
                </div>

                
            </div>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div class="p-2 bd-highlight">
                    <button type="button" id="btnAdd" class="btn btn-primary" btn-lg btn-block"><i class="fas fa-plus"></i> Equipments</button>
                </div>

                <div class="p-2 bd-highlight">
                    <a class="btn btn-success" href="/equipmentsdata-pdf">Generate PDF <i class="far fa-file-pdf"></i></a>
                </div>
                
                <div class="ml-auto p-2 bd-highlight">
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
                    @if(count ($equipmentQuery) > 0)
                    @foreach ($equipmentQuery as $equipment)
                        <tr id="record_id_{{$equipment->id}}">
                            <td>{{$equipment->equipment_id}}</td>
                            <td>{{$equipment->equipmentName}}</td>
                            <td>{{$equipment->quantity}}</td>
                            <td>
                                <button type="button" id="btnEdit" class="btn btn-primary" btn-lg btn-block" data-id="{{$equipment->id}}"><i class="far fa-edit"></i></button>
                                <button type="button" id="btnDelete" class="btn btn-danger" btn-lg btn-block" data-id="{{$equipment->id}}"><i class="far fa-trash-alt"></i></button>
                                
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <div class="alert alert-info" role="alert">
                        <i class="fas fa-info"></i>
                        No record of <strong>equipments</strong> found 
                    </div>
                    @endif
                </tbody>
            </table>
            {{ $equipmentQuery->links() }}

            <!-- AddUpdateModal -->
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
                            <form id="addUpdateForm" novalidate>
                                <div class="form-group">
                                    <input type="text" name="id" id="id" class="form-control" hidden>
                                </div>
                                <div class="form-group">
                                    <label>Equipment Id</label>
                                    <input type="text" class="form-control" name="equipment_id" id="equipment_id" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Equipment Name</label>
                                    <input type="text" class="form-control" name="equipmentName" id="equipmentName" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" class="form-control" name="quantity" id="quantity" value=1 placeholder="">
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

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    Are you sure? 
                    </div>
                    <div class="modal-footer">
                    
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
 

 

    @include('equipments/equipments_script')
@endsection
