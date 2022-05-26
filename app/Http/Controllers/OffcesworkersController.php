<?php

namespace App\Http\Controllers;

use App\Models\Offcesworkers;
use App\Http\Requests\StoreOffcesworkersRequest;
use App\Http\Requests\UpdateOffcesworkersRequest;
use App\Models\offices;
use App\Models\User;
use Illuminate\Http\Request;
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
        $Employee=Offcesworkers::join('offices','offices.id', '=', 'offcesworkers.office_id')
        ->join('users','users.id', '=', 'offcesworkers.user_id')
        ->where('offices.admin_id','=',[Auth::user()->id])
        ->select('offcesworkers.id','users.name','users.email','users.phone_number')
        ->get();
        
        return view('Admin_Offices.AddWorker',compact('Employee'));
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
        $Office = offices::join('users', 'users.id', '=', 'offices.admin_id')
        ->where('offices.admin_id', '=', [Auth::user()->id])
        ->select('offices.id')
        ->first();
        
        $user=User::where('email','=',$request->email)
        ->select("id")->first();
        
        // Offcesworkers::create([
        //     'office_id' => $Office->id,
        //     'user_id' => $user->id,
        // ]);
        $Offcesworkers= new Offcesworkers();
        $Offcesworkers->office_id = $Office->id;
        $Offcesworkers->user_id = $user->id;
        $Offcesworkers->save();
        // dd($Offcesworkers);
        DB::update('update role_user set role_id = ? where user_id = ?', ['3',$user->id]);

        return redirect()->back()->withErrors(['Employee has been added successfully.']);

        // dd($Offcesworker);
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
    public function edit()
    {
        $Employee=Offcesworkers::join('offices','offices.id', '=', 'offcesworkers.office_id')
        ->join('users','users.id', '=', 'offcesworkers.user_id')
        ->where('offices.admin_id','=',[Auth::user()->id])
        ->select('offcesworkers.id','users.name','users.email','users.phone_number')
        ->get();
        
        return view('Admin_Offices.DeleteWorker',compact('Employee'));
    }

    public function DeleteWorker(Request $request)
    {
        
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
        Offcesworkers::find($request->id)->delete();
        return redirect()->back()->withErrors(['Worker Deleted.']);
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
