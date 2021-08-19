<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequests;
use App\Room;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
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
        $roomQuery = Room::orderBy('room_id')->paginate(5);
        return view('rooms.rooms', compact('roomQuery'));
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
    public function store(RoomRequests $request)
    {       

        $roomQuery = Room::updateOrCreate(
            ['id'=>$request->id],$request->all()
        );
        return FacadesResponse::json($roomQuery);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return FacadesResponse::json($room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
    }

    public function search()
    {
        $search = $_GET['search-query-rooms'];
        $searchQuery = Room::where('room_id', 'LIKE', '%'.$search.'%')
                                ->orWhere('roomDes', 'LIKE', '%'.$search.'%')
                                ->get();

        return view('rooms.roomssearch', compact('searchQuery'));  
    }

    public function getdata()
    {
        $roomQuery = Room::all();

        return view('rooms.roomsdata', compact('roomQuery'));
    }

    public function generatePDF()
    {
        $roomQuery = Room::all();
        $pdf = PDF::loadview('rooms.roomsdata', compact('roomQuery'))->setPaper('a4', 'portrait');
        return $pdf->download('Room-list.pdf');
    }
}
