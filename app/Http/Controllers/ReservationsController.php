<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use App\Http\Requests\StoreReservationsRequest;
use App\Http\Requests\UpdateReservationsRequest;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreReservationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationsRequest $request)
    {
        // $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
        //     ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
        //     ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
        //     ->join('locations','locations.id', '=', 'offices.location_id')
        //     ->join('countries','countries.id', '=','locations.country_id' )
        //     ->join('cities','cities.id', '=', 'locations.city_id')
        //     ->where('vehicles.id','=',$request->vehicle_id)
        //     ->select('locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','vehicles.picture_path','vehicles.price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.capacity','vehicles.id',)
        //     ->get();
        //     return view('User.AcceptReservation',compact('vehicles'));
        
            dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservations  $reservations
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
            ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
            ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
            ->join('locations','locations.id', '=', 'offices.location_id')
            ->join('countries','countries.id', '=','locations.country_id' )
            ->join('cities','cities.id', '=', 'locations.city_id')
            ->where('vehicles.id','=',$request->vehicle_id)
            ->select('locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','vehicles.picture_path','vehicles.price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.capacity','vehicles.id',)
            ->get();
            return view('User.AcceptReservation',compact('vehicles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservations  $reservations
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservations $reservations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationsRequest  $request
     * @param  \App\Models\Reservations  $reservations
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationsRequest $request, Reservations $reservations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservations  $reservations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservations $reservations)
    {
        //
    }
}
