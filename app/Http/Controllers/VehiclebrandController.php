<?php

namespace App\Http\Controllers;

use App\Models\Vehiclebrand;
use App\Http\Requests\StoreVehiclebrandRequest;
use App\Http\Requests\UpdateVehiclebrandRequest;

class VehiclebrandController extends Controller
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
     * @param  \App\Http\Requests\StoreVehiclebrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehiclebrandRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiclebrand  $vehiclebrand
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiclebrand $vehiclebrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiclebrand  $vehiclebrand
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiclebrand $vehiclebrand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehiclebrandRequest  $request
     * @param  \App\Models\Vehiclebrand  $vehiclebrand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehiclebrandRequest $request, Vehiclebrand $vehiclebrand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiclebrand  $vehiclebrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiclebrand $vehiclebrand)
    {
        //
    }
}
