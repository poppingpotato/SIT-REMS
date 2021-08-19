<?php

namespace App\Http\Controllers;

use App\Borrow;
use App\Employee;
use App\Equipment;
use App\Reserve;
use App\Room;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
    $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipmentQuery = Equipment::count();
        $roomQuery = Room::count();
        $studentQuery = Student::count();
        $employeeQuery = Employee::count();
        $reserveQuery = Reserve::count();
        $borrowQuery = Borrow::count();

        return view('dashboard.index' ,compact('studentQuery', 'employeeQuery', 'equipmentQuery', 'roomQuery', 'reserveQuery', 'borrowQuery'));
        /* return view('dashboard.index') */;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

}
