<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-material-datetimepicker.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    

    <!-- Fonts --> 
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">

    <title>@yield('title', 'SIT-REMS')</title>
    
    <link rel="icon" href="{{asset('images/UB-LOGO-ICO.ico')}}" type="image/icon type" id="title-icon">
</head>
<body>
    <div class="d-flex" id="wrapper">
            
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="logo">
          <img src="{{ asset('images/UB-LOGO.png') }}" class="card-img-top img-sm rounded-circle" alt="UB LOGO" id="UB-logo">
        </div>
        <div class="sidebar-heading">{{ config('app.name', 'SIT-REMS') }}</div>
          <div class="list-group list-group-flush">
            @if(Auth::check() && Auth::user()->is_admin == 1)
            <a href="{{ route('dashboard.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-tachometer-alt menu-icon"></i> <span class="menu-title">Dashboard</span></a>
            <a href="{{ route('borrow.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-book menu-icon"></i> <span class="menu-title">Borrow</span></a>
            <a href="{{ route('reserve.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-calendar menu-icon"></i> <span class="menu-title">Reserve</span></a>
           
            <a href="{{ route('rooms.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-door-open menu-icon"></i> <span class="menu-title">Rooms</span></a>
            <a href="{{ route('equipments.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-wrench menu-icon"></i> <span class="menu-title">Equipments</span></a>
         
            <a href="{{ route('employee.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-user-tie menu-icon"></i> <span class="menu-title">Employees</span></a>
            <a href="{{ route('student.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-users menu-icon"></i> <span class="menu-title">Students</span></a>

            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="far fa-user menu-icon"></i> <span class="menu-title">Users</span></a>
            @else

            <a href="{{ route('dashboard.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-tachometer-alt menu-icon"></i> <span class="menu-title">Dashboard</span></a>
            <a href="{{ route('borrow.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-book menu-icon"></i> <span class="menu-title">Borrow</span></a>
            <a href="{{ route('reserve.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-calendar menu-icon"></i> <span class="menu-title">Reserve</span></a>
            @endif
            <a href="{{ route('usertransactions.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="far fa-user menu-icon"></i> <span class="menu-title">User Transactions</span></a>
          </div>
        </div>
        <!-- /#sidebar-wrapper -->
    
        <!-- Page Content -->
        <div id="page-content-wrapper">
        
        @include('layouts.nav')

        <div class="content">
            <div class="container-fluid">
                <div class="container">
                    <x-alert/>
                </div>
                @yield('content')
            </div>
        </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->      
    </div>
    @include('layouts.master_script')
</body>
</html>


