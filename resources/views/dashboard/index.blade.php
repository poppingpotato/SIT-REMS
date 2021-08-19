@extends('layouts.master')

@section('title') 
REMS-Dashboard
@endsection

@section('content')
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
            <div>
            <h4 class="font-weight-bold mb-0">Dashboard</h4>
            </div>
        </div>
      </div>

    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">   
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Welcome Back!</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ Auth::user()->idNumber }}</h3>
                        <i class="far fa-user fa-2x text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
                    
            </div>  
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">   
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Equipments</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$equipmentQuery}}</h3>
                        <i class="fas fa-tools fa-2x text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">   
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Rooms</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$roomQuery}}</h3>
                        <i class="fas fa-door-open fa-2x text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">   
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Reserved</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$reserveQuery}}</h3>
                        <i class="fas fa-door-open fa-2x text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">   
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Borrowed</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$borrowQuery}}</h3>
                        <i class="fas fa-door-open fa-2x text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
@endsection