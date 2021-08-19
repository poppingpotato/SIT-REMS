
@extends('layouts.master')

@section('title') 
REMS-Rooms
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div class="p-2 bd-highlight">
                    <a class="btn btn-primary" href="/rooms"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                
                <div class="">
                    <form class="form-inline my-2 my-lg-0" type="get" action={{ url('/roomssearch') }}>
                        <input class="form-control mr-sm-2" type="text" name="search-query-rooms" placeholder="Search">
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
                        <th>Room Id</th>
                        <th>Room Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count ($searchQuery) > 0)
                    @foreach ($searchQuery as $search)
                        <tr id="record_id_{{$search->id}}">
                        <td>{{$search->room_id}}</td>
                            <td>{{$search->roomDes}}</td>
                            <td>
                                <button type="button" id="btnEdit" class="btn btn-primary" btn-lg btn-block" data-id="{{$search->id}}">Edit</button>
                                <button type="button" id="btnDelete" class="btn btn-danger" btn-lg btn-block" data-id="{{$search->id}}">Delete</button>
                              
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <div class="alert alert-info" role="alert">
                        <i class="fas fa-info"></i>
                        No <strong>rooms</strong> found 
                    </div>
                    @endif
                </tbody>
            </table>
          {{--   {{ $roomQuery->links() }} --}}

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
                                    <label>Room Id</label>
                                    <input type="text" class="form-control" name="room_id" id="room_id" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Room Description</label>
                                    <input type="text" class="form-control" name="roomDes" id="roomDes" placeholder="">
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
        
</div>
 
    @include('rooms/rooms_script')
@endsection