<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Http\Requests\EquipmentRequest;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Response;

class EquipmentController extends Controller
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
        $equipmentQuery = Equipment::orderBy('equipmentName')->paginate(5);
        return view('equipments.index', compact('equipmentQuery'));
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
    public function store(EquipmentRequest $request)
    {
        $equipmentQuery = Equipment::updateOrCreate(
            ['id'=>$request->id],$request->all()
        );
        return Response::json($equipmentQuery);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        return Response::json($equipment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
    }

    public function search()
    {
        $search = $_GET['search-query-equipments'];
        $searchQuery = Equipment::where('equipment_id', 'LIKE', '%'.$search.'%')
                                ->orWhere('equipmentName', 'LIKE', '%'.$search.'%')
                                ->orWhere('quantity', 'LIKE', '%'.$search.'%')
                                ->get();

        return view('equipments.equipmentssearch', compact('searchQuery'));   
    }

    public function getdata()
    {
        $equipmentQuery = Equipment::all();

        return view('equipments.equipmentsdata', compact('equipmentQuery'));
    }

    public function generatePDF()
    {
        $equipmentQuery = Equipment::all();
        $pdf = PDF::loadview('equipments.equipmentsdata', compact('equipmentQuery'))->setPaper('a4', 'portrait');
        return $pdf->download('Equipment-list.pdf');
    }
}
