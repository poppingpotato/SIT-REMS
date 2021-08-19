<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade as PDF;

class StudentController extends Controller
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
        $studentQuery = Student::orderBy('lastName')->paginate(5);
        return view('student.index', compact('studentQuery'));
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
    public function store(StudentRequest $request)
    {
        $studentQuery = Student::updateOrCreate(
            ['id'=>$request->id],$request->all()
        );
        return Response::json($studentQuery);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return Response::json($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
    }

    public function search()
    {
        $search = $_GET['search-query-student'];
        $searchQuery = Student::where('student_id', 'LIKE', '%'.$search.'%')
                                ->orWhere('lastName', 'LIKE', '%'.$search.'%')
                                ->orWhere('firstName', 'LIKE', '%'.$search.'%')
                                ->get();

        return view('student.studentsearch', compact('searchQuery'));  
    }

    public function getdata()
    {
        $studentQuery = Student::all();

        return view('student.studentdata', compact('studentQuery'));
    }

    public function generatePDF()
    {
        $studentQuery = Student::all();
        $pdf = PDF::loadview('student.studentdata', compact('studentQuery'))->setPaper('a4', 'portrait');
        return $pdf->download('Student-list.pdf');
    }
}
