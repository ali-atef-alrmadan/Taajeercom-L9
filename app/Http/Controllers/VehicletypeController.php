<?php

namespace App\Http\Controllers;

use App\Models\Vehicletype;
use App\Http\Requests\StoreVehicletypeRequest;
use App\Http\Requests\UpdateVehicletypeRequest;

class VehicletypeController extends Controller
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
     * @param  \App\Http\Requests\StoreVehicletypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicletypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicletype  $vehicletype
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicletype $vehicletype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicletype  $vehicletype
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicletype $vehicletype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicletypeRequest  $request
     * @param  \App\Models\Vehicletype  $vehicletype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicletypeRequest $request, Vehicletype $vehicletype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicletype  $vehicletype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicletype $vehicletype)
    {
        //
    }
}
