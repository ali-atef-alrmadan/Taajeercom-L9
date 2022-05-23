<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Vehiclebrand;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities= Cities::all();
        $brands= Vehiclebrand::all();
        // 'offcesworkers.id','users.name','users.email','users.phone_number','offcesworkers.Salary'
        $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
        ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
        ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
        ->join('locations','locations.id', '=', 'offices.location_id')
        ->join('countries','countries.id', '=','locations.country_id' )
        ->join('cities','cities.id', '=', 'locations.city_id')
        ->select('*')
        ->get();
        // dd($vehicles);

        return view('home',compact('cities','brands','vehicles'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
