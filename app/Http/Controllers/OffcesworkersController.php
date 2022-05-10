<?php

namespace App\Http\Controllers;

use App\Models\Offcesworkers;
use App\Http\Requests\StoreOffcesworkersRequest;
use App\Http\Requests\UpdateOffcesworkersRequest;
use App\Models\offices;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OffcesworkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin_Offices.AddWorker');
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
     * @param  \App\Http\Requests\StoreOffcesworkersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOffcesworkersRequest $request)
    {
        $users= User::where('email','like','%'.$request->email.'%')->select('id')->first();
        
        
        $Office = offices::join('users', 'users.id', '=', 'offices.admin_id')
        ->where('offices.admin_id', '=', [Auth::user()->id])
        ->select('offices.id')
        ->first();

        $Offcesworker= new Offcesworkers();
        $Offcesworker->user_id=$users->id;
        $Offcesworker->office_id=$Office->id;
        $Offcesworker->save();

        $users=DB::update('update role_user set role_id = ? where user_id = ?', ['3',$users->id]);


        // dd($Offcesworker);

        return redirect()->back()->withErrors(['Done add employee']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offcesworkers  $offcesworkers
     * @return \Illuminate\Http\Response
     */
    public function show(Offcesworkers $offcesworkers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offcesworkers  $offcesworkers
     * @return \Illuminate\Http\Response
     */
    public function edit(Offcesworkers $offcesworkers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOffcesworkersRequest  $request
     * @param  \App\Models\Offcesworkers  $offcesworkers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOffcesworkersRequest $request, Offcesworkers $offcesworkers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offcesworkers  $offcesworkers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offcesworkers $offcesworkers)
    {
        //
    }
}
