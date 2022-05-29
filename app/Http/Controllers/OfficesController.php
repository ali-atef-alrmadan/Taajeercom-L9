<?php

namespace App\Http\Controllers;

use App\Models\offices;
use App\Http\Requests\StoreofficesRequest;
use App\Http\Requests\UpdateofficesRequest;
use App\Models\Cities;
use App\Models\Countries;
use App\Models\locations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OfficesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AddToOffice');
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
     * @param  \App\Http\Requests\StoreofficesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreofficesRequest $request)
    {
        $country=new Countries();
        $country->country=$request->country;
        $country->save();

        $city= new Cities();
        $city->city=$request->city;
        $city->save();
        
        $location=new locations();
        $location->country_id=$country->id;
        $location->city_id=$city->id;
        $location->address_description=$request->address_description;
        $location->save();

        $offices=new offices();
        $offices->admin_id=Auth::user()->id;
        $offices->location_id=$location->id;
        $offices->name=$request->name;
        $offices->phone_number=$request->phone_number;
        $offices->description=$request->description;
        $offices->save();

        return redirect()->back()->withErrors(['The request to establish the office is under approval.']);
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function show(offices $offices)
    {
        $offices= offices::where('status',0)->select('*')->get();
        // dd($offices);

        return view('Admin.AcceptforOffices',compact('offices'));
        // dd($offices);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function updaterejecte(Request $request)
    {
        offices::where('id',$request->Offices_id)
            ->update(['status' => 2]);
        return redirect()->back()->withErrors(['Office Rejected']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateofficesRequest  $request
     * @param  \App\Models\offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateofficesRequest $request, offices $offices)
    {
        $offices=DB::update('update offices set status = ? where id = ?', ['1',$request->Offices_id]);
        $users=DB::update('update role_user set role_id = ? where user_id = ?', ['2',$request->admin_id]);
        return redirect()->back()->withErrors(['Done add offices']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\offices  $offices
     * @return \Illuminate\Http\Response
     */
    public function destroy(offices $offices)
    {
        //
    }
}
