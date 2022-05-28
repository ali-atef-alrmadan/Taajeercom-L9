<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use App\Http\Requests\StoreReservationsRequest;
use App\Http\Requests\UpdateReservationsRequest;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Reservations= Reservations::join('vehicles','vehicles.id', '=', 'reservations.vehicles_id')
            ->join('offices','offices.id', '=', 'vehicles.owner_id')
            ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
            ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
            ->join('locations','locations.id', '=', 'offices.location_id')
            ->join('countries','countries.id', '=','locations.country_id' )
            ->join('cities','cities.id', '=', 'locations.city_id')
            ->where('reservations.user_id','=',[Auth::user()->id])
            ->select('reservations.Status','locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','reservations.Price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.model','reservations.Start_date','reservations.End_date')
            ->orderBy('reservations.Status', 'asc')
            ->get();
            
        return view('User.Reservation',compact('Reservations'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationsRequest $request)
    {
        Reservations::create([
            "Start_date" => $request->Start_date,
            "End_date" => $request->End_date ,
            "Price" => $request->FinalPrice ,
            "vehicles_id" => $request->vehicle_id,
            "Status" => '0',
            "user_id" =>Auth::user()->id
        ]);

        Vehicles::where('id',$request->vehicle_id)
        ->update([
        'available' => '0' ,
        ]);
        return redirect('Reservation')->withErrors(['Done Reservations.']);
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
    public function DecisionReservation()
    {
        $Reservations= Reservations::join('vehicles','vehicles.id', '=', 'reservations.vehicles_id')
            ->join('offices','offices.id', '=', 'vehicles.owner_id')
            ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
            ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
            ->join('locations','locations.id', '=', 'offices.location_id')
            ->join('countries','countries.id', '=','locations.country_id' )
            ->join('cities','cities.id', '=', 'locations.city_id')
            ->select('reservations.id',"reservations.vehicles_id",'reservations.Status','locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','reservations.Price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.model','reservations.Start_date','reservations.End_date')
            ->orderBy('reservations.Status', 'asc')
            ->get();
            
            // dd($Reservations);
            
            
        return view('Workers.DecisionReservation',compact('Reservations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationsRequest  $request
     * @param  \App\Models\Reservations  $reservations
     * @return \Illuminate\Http\Response
     */
    public function SaveReservation(UpdateReservationsRequest $request)
    {
        Reservations::where('id',$request->id)
        ->update([
        'Status' => '1',
        ]);

        return redirect()->back()->withErrors(['Save Reservation.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function DeleteReservation(Request $request)
    {
        Reservations::where('id',$request->id)
        ->update([
        'Status' => '2' ,
        ]);

        Vehicles::where('id',$request->vehicle_id)
        ->update([
        'available' => 1 ,
        ]);

        return redirect()->back()->withErrors(['Delete Reservation.']);
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
