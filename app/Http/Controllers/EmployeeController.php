<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade as PDF;

class EmployeeController extends Controller
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
        $employeeQuery = Employee::orderBy('lastName')->paginate(5);
        return view('employee.index', compact('employeeQuery'));
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
    public function store(EmployeeRequest $request)
    {
        $employeeQuery = Employee::updateOrCreate(
            ['id'=>$request->id],$request->all()
        );
        return Response::json($employeeQuery);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return Response::json($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
    }

    public function search()
    {
        $search = $_GET['search-query-employee'];
        $searchQuery = Employee::where('employee_id', 'LIKE', '%'.$search.'%')
                                ->orWhere('lastName', 'LIKE', '%'.$search.'%')
                                ->orWhere('firstName', 'LIKE', '%'.$search.'%')
                                ->get();

        return view('employee.employeesearch', compact('searchQuery'));   
    }

    public function getdata()
    {
        $employeeQuery = Employee::all();

        return view('employee.employeedata', compact('employeeQuery'));
    }

    public function generatePDF()
    {
        $employeeQuery = Employee::all();
        $pdf = PDF::loadview('employee.employeedata', compact('employeeQuery'))->setPaper('a4', 'portrait');
        return $pdf->download('Employee-list.pdf');
    }
}
