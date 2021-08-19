<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade as PDF;

class UserController extends Controller
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
        $userQuery = User::orderBy('created_at')->paginate(5);
        return view('users.index', compact('userQuery')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userQuery = User::updateOrCreate(
            ['id'=>$request->id],$request->all()
        );
        return Response::json($userQuery);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return Response::json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }

    public function search()
    {
        $search = $_GET['search-query-users'];
        $searchQuery = User::where('idNumber', 'LIKE', '%'.$search.'%')
                                ->orWhere('lastName', 'LIKE', '%'.$search.'%')
                                ->orWhere('firstName', 'LIKE', '%'.$search.'%')
                                ->get();

        return view('users.userssearch', compact('searchQuery'));  
    }

    public function getdata()
    {
        $userQuery = User::all();

        return view('users.usersdata', compact('userQuery'));
    }

    public function generatePDF()
    {
        $userQuery = User::all();
        $pdf = PDF::loadview('users.usersdata', compact('userQuery'))->setPaper('a4', 'portrait');
        return $pdf->download('User-list.pdf');
    }
}
