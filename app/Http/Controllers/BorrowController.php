<?php

namespace App\Http\Controllers;

use App\Borrow;
use App\Employee;
use App\Equipment;
use App\Http\Requests\BorrowRequest;
use App\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class BorrowController extends Controller
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
        $BorrowQuery = Borrow::orderBy('start', 'desc')->paginate(5);
        return view('borrow.index', compact('BorrowQuery')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipments= Equipment::pluck('equipmentName', 'equipment_id');
        $employee= Employee::pluck('employee_id','employee_id');
        $student= Student::pluck('student_id','student_id');
        return view('borrow.create', compact('equipments','employee', 'student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BorrowRequest $request)
    {
        $BorrowQuery = new Borrow();
        $BorrowQuery->employee_id = $request->input('employee_id');
        $BorrowQuery->student_id = $request->input('student_id');
        $BorrowQuery->eq_b_id = $request->input('eq_b_id');
        $BorrowQuery->quantity = $request->input('quantity');
        $BorrowQuery->ReleasedBy_SA_ID = auth()->user()->idNumber;
        $BorrowQuery->start = $request->input('start');
/*      $BorrowQuery->RecievedBy_SA_ID = $request->input('RecievedBy_SA_ID'); */
    /*  $BorrowQuery->end = $request->input('end'); */
        $BorrowQuery->status = $request->input('status');
        //$equipment->user_id = auth()->user()->id;
        $BorrowQuery->save();

        return redirect('/borrow')->with('message', 'Borrowing is a successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $BorrowQuery = Borrow::find($id);
        return view('borrow.show')->with('BorrowQuery', $BorrowQuery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $BorrowQuery = Borrow::find($id);
        $equipments= Equipment::pluck('equipmentName', 'equipment_id');
        $employee= Employee::pluck('employee_id','employee_id');
        $student= Student::pluck('student_id','student_id');
        return view('borrow.edit', compact('equipments', 'employee', 'student'))->with('BorrowQuery', $BorrowQuery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BorrowRequest $request, $id)
    {
        $BorrowQuery = Borrow::find($id);
        $BorrowQuery->employee_id = $request->input('employee_id');
        $BorrowQuery->student_id = $request->input('student_id');
        $BorrowQuery->eq_b_id = $request->input('eq_b_id');
        $BorrowQuery->quantity = $request->input('quantity');
        /* $BorrowQuery->ReleasedBy_SA_ID = auth()->user()->idNumber; */
        $BorrowQuery->start = $request->input('start');
        $BorrowQuery->RecievedBy_SA_ID = auth()->user()->idNumber;
        $BorrowQuery->end = $request->input('end');
        $BorrowQuery->status = $request->input('status');
        //$equipment->user_id = auth()->user()->id;
        $BorrowQuery->save();

        return redirect('/borrow')->with('message', 'Updating is a successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $BorrowQuery = Borrow::find($id);
        $BorrowQuery->delete();
        return redirect('/borrow')->with('message', 'Delete borrowing is a successful');
    
    }

    public function search(Request $request)
    {
        $search = $request->input('search-query-borrow');
        if($search != ""){
            $searchQuery = Borrow::where(function($query) use ($search){
                $query->where('employee_id', 'LIKE', '%'.$search.'%')
                ->orWhere('student_id', 'LIKE', '%'.$search.'%')
                ->orWhere('eq_b_id', 'LIKE', '%'.$search.'%');
            })->paginate(5);
            $searchQuery->appends(['search-query-borrow' => $search]);
        }
        else{
            $searchQuery = Borrow::paginate(5);
        }

        return view('borrow.borrowsearch')->with('searchQuery', $searchQuery);   
    }


    public function generatePDF()
    {
        $search = $_GET['filter-query-borrow'];
                
        $BorrowQuery = Borrow::where('start', 'LIKE', '%'.$search.'%')->get()->sortBy('status');

        $pdf = PDF::loadview('borrow.borrowdata', compact('BorrowQuery'))->setPaper('a4', 'landscape');
        return $pdf->download('Borrow-list.pdf');
    }
}
