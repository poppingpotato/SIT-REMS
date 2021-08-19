<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Equipment;
use App\Http\Requests\ReserveRequest;
use App\Reserve;
use App\Room;
use App\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Request as FacadesRequest;

class ReserveController extends Controller
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
        $ReserveQuery = Reserve::orderBy('created_at', 'desc')->paginate(5);
        return view('reserve.index', ['ReserveQuery' => $ReserveQuery])->with('ReserveQuery', $ReserveQuery); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipments= Equipment::pluck('equipmentName', 'equipment_id');
        $rooms= Room::pluck('room_id','room_id');
        $employee= Employee::pluck('employee_id','employee_id');
        return view('reserve.create', compact('equipments', 'rooms', 'employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReserveRequest $request)
    {
        $ReserveQuery = new Reserve;
        $ReserveQuery->employee_id = $request->input('employee_id');
        $ReserveQuery->eq_r_id = $request->input('eq_r_id');
        $ReserveQuery->quantity = $request->input('quantity');
        $ReserveQuery->room_id = $request->input('room_id');
        $ReserveQuery->ReservedBy_SA_ID = auth()->user()->idNumber;
        $ReserveQuery->start = $request->input('start');
/*      $employeeReserveQuery->RecievedBy_SA_ID = $request->input('RecievedBy_SA_ID'); */
        $ReserveQuery->end = $request->input('end');
        $ReserveQuery->status = $request->input('status');
        //$equipment->user_id = auth()->user()->id;
        $ReserveQuery->save();

        return redirect('/reserve')->with('message', 'Reservation is a successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ReserveQuery = Reserve::find($id);
        return view('reserve.show')->with('ReserveQuery', $ReserveQuery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipments= Equipment::pluck('equipmentName', 'equipment_id');
        $rooms= Room::pluck('room_id','room_id');
        $ReserveQuery = Reserve::find($id);
        return view('reserve.edit', compact('equipments', 'rooms'))->with('ReserveQuery', $ReserveQuery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReserveRequest $request, $id)
    {
        $ReserveQuery = Reserve::find($id);
        $ReserveQuery->employee_id = $request->input('employee_id');
        $ReserveQuery->eq_r_id = $request->input('eq_r_id');
        $ReserveQuery->quantity = $request->input('quantity');
        $ReserveQuery->room_id = $request->input('room_id');
        $ReserveQuery->ReservedBy_SA_ID = auth()->user()->idNumber;
        $ReserveQuery->start = $request->input('start');
/*      $employeeReserveQuery->RecievedBy_SA_ID = $request->input('RecievedBy_SA_ID'); */
        $ReserveQuery->end = $request->input('end');
        $ReserveQuery->status = $request->input('status');
        //$equipment->user_id = auth()->user()->id;
        $ReserveQuery->save();

        return redirect('/reserve')->with('message', 'Update reservation is a successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ReserveQuery = Reserve::find($id);
        $ReserveQuery->delete();
        return redirect('/reserve')->with('message', 'Delete reservation is a successful');
    }

    public function search(Request $request)
    {
        /* $search = $request->input('search-query-borrow');
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
        } */

        $search = $request->input('search-query-reserve');
        if($search != ""){
            $searchQuery = Reserve::where(function($query) use ($search){
                $query->where('employee_id', 'LIKE', '%'.$search.'%')
                ->orWhere('eq_r_id', 'LIKE', '%'.$search.'%')
                ->orWhere('quantity', 'LIKE', '%'.$search.'%')
                ->orWhere('room_id', 'LIKE', '%'.$search.'%');
            })->paginate(5);
            $searchQuery->appends(['search-query-reserve']);
        }
        else{
            $searchQuery = Reserve::paginate(5);
        }
/*         $searchQuery = Reserve::where('employee_id', 'LIKE', '%'.$search.'%')
                                ->orWhere('eq_r_id', 'LIKE', '%'.$search.'%')
                                ->orWhere('quantity', 'LIKE', '%'.$search.'%')
                                ->orWhere('room_id', 'LIKE', '%'.$search.'%')
                                ->get(); */
       
        return view('reserve.reservesearch')->with('searchQuery',$searchQuery);   
    }

 /*    public function getdata()
    {
        $ReserveQuery = Reserve::all();

        return view('reserve.reservedata', compact('ReserveQuery'));
    } */

    public function generatePDF()
    {
        $search = $_GET['filter-query-reserve'];
                
        $ReserveQuery = Reserve::where('start', 'LIKE', '%'.$search.'%')->get()->sortBy('status');

        $pdf = PDF::loadview('reserve.reservedata', compact('ReserveQuery'))->setPaper('a4', 'landscape');
        return $pdf->download('Reservation-list.pdf');
    }
}
