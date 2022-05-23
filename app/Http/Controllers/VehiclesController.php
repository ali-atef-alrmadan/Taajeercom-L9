<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use App\Http\Requests\StoreVehiclesRequest;
use App\Http\Requests\UpdateVehiclesRequest;
use App\Models\Offcesworkers;
use App\Models\Vehiclebrand;
use App\Models\Vehicletype;
use Illuminate\Support\Facades\Auth;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Workers.Addvehicle');
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
     * @param  \App\Http\Requests\StoreVehiclesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehiclesRequest $request)
    {
        // save Image in database and storge Image
        $IMG_File=$request->file('picture');
        $IMG_filename=time().'.'.$IMG_File->getClientOriginalExtension();
        $IMG_File->storeAs('public/images_Vehicle',$IMG_filename);

        $owner=Offcesworkers::select("office_id")
        ->where('user_id','=',[Auth::user()->id])
        ->first();

        $brand=new Vehiclebrand();
        $brand->brand=$request->brand;
        $brand->save();
        
        $type=new Vehicletype();
        $type->type=$request->type;
        $type->save();


        Vehicles::create([
            'owner_id' =>$owner->office_id,
            'brand_id' =>$brand->id,
            'type_id' =>$type->id,
            'model' =>$request->model,
            'year' =>$request->year,
            'color' =>$request->color,
            'capacity' =>$request->capacity,
            'license_number' =>$request->license_number,
            'price' =>$request->price,
            'description' =>$request->description,
            'available' =>1,
            'picture_path' =>$IMG_filename,
        ]);

        // dd($request);
        return redirect()->back()->withErrors(['Done Add Vehicle.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicles $vehicles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicles $vehicles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehiclesRequest  $request
     * @param  \App\Models\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehiclesRequest $request, Vehicles $vehicles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicles $vehicles)
    {
        //
    }
}
