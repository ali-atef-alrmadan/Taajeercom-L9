<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use App\Http\Requests\StoreVehiclesRequest;
use App\Http\Requests\UpdateVehiclesRequest;
use App\Models\Offcesworkers;
use App\Models\offices;
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

    public function View()
    {
        if (Auth::user()->hasRole('Office-Admin'))
        {
            $MyOffice=offices::where('admin_id','=',[Auth::user()->id])
                ->select("id")->first();

                $Vehicles=Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
                ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
                ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
                ->join('locations','locations.id', '=', 'offices.location_id')
                ->join('countries','countries.id', '=','locations.country_id' )
                ->join('cities','cities.id', '=', 'locations.city_id')
                ->where('owner_id','=',$MyOffice->office_id)
                ->select('*')
                ->get();
                
                return view('Workers.ViewVehicle',compact('Vehicles'));
        }
        elseif (Auth::user()->hasRole('Worker'))
        {
            $MyOffice=Offcesworkers::where('user_id','=',[Auth::user()->id])
                ->select("office_id")->first();

                $Vehicles=Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
                ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
                ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
                ->join('locations','locations.id', '=', 'offices.location_id')
                ->join('countries','countries.id', '=','locations.country_id' )
                ->join('cities','cities.id', '=', 'locations.city_id')
                ->where('owner_id','=',$MyOffice->office_id)
                ->select('*')
                ->get();
                
                return view('Workers.ViewVehicle',compact('Vehicles'));
        }
        
    }
    
public function edit(Vehicles $vehicles)
    {
        if (Auth::user()->hasRole('Office-Admin'))
        {
            $MyOffice=offices::where('admin_id','=',[Auth::user()->id])
                ->select("id")->first();
            
            $Vehicles=Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
            ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
            ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
            ->where('owner_id','=',$MyOffice->office_id)
            ->select('vehiclebrands.brand','vehicletypes.type','vehicles.id','vehicles.model','vehicles.year','vehicles.color','vehicles.capacity','vehicles.license_number','vehicles.price','vehicles.description','vehicles.picture_path','vehicles.available',)
            ->get();
            
            return view('Workers.EditVehicle',compact('Vehicles'));
        }

        elseif (Auth::user()->hasRole('Worker'))
        {
            $MyOffice=Offcesworkers::where('user_id','=',[Auth::user()->id])
            ->select("office_id")->first();

            $Vehicles=Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
            ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
            ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
            ->where('owner_id','=',$MyOffice->office_id)
            ->select('vehiclebrands.brand','vehicletypes.type','vehicles.id','vehicles.model','vehicles.year','vehicles.color','vehicles.capacity','vehicles.license_number','vehicles.price','vehicles.description','vehicles.picture_path','vehicles.available',)
            ->get();
            
            return view('Workers.EditVehicle',compact('Vehicles'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehiclesRequest  $request
     * @param  \App\Models\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehiclesRequest $request)
    {
        // dd($request);
        if($request->file('picture_path')==true)
        {
            // save Image in database and storge Image
        $IMG_File=$request->file('picture_path');
        $IMG_filename=time().'.'.$IMG_File->getClientOriginalExtension();
        $IMG_File->storeAs('public/picture_path',$IMG_filename);
        Vehicles::where('id',$request->id)
        ->update([
        'picture_path' =>$IMG_filename ,
        ]);
        }

        
        Vehicles::where('id',$request->id)
        ->update([
            'model' =>$request->model,
            'year' =>$request->year,
            'color' =>$request->color,
            'capacity' =>$request->capacity,
            'license_number' =>$request->license_number,
            'price' =>$request->price,
            'description' =>$request->description,
            'available' =>$request->available,
        ]);
        
        return redirect()->back()->withErrors(['Vehicles Updated.']);
    
    }


    public function DeleteVehicle(UpdateVehiclesRequest $request, Vehicles $vehicles)
    {
        Vehicles::find($request->id)->delete();
        return redirect()->back()->withErrors(['Vehicles Deleted.']);
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
        if (Auth::user()->hasRole('Office-Admin'))
        {
            // save Image in database and storge Image
            $IMG_File=$request->file('picture');
            $IMG_filename=time().'.'.$IMG_File->getClientOriginalExtension();
            $IMG_File->storeAs('public/images_Vehicle',$IMG_filename);

            $MyOffice=offices::where('admin_id','=',[Auth::user()->id])
                ->select("id")->first();

            $brand=new Vehiclebrand();
            $brand->brand=$request->brand;
            $brand->save();
            
            $type=new Vehicletype();
            $type->type=$request->type;
            $type->save();


            Vehicles::create([
                'owner_id' =>$MyOffice->id,
                'brand_id' =>$brand->id,
                'type_id' =>$type->id,
                'model' =>$request->model,
                'year' =>$request->year,
                'color' =>$request->color,
                'capacity' =>$request->capacity,
                'license_number' =>$request->license_number,
                'price' =>$request->price,
                'description' =>$request->description,
                'available' =>'Available',
                'picture_path' =>$IMG_filename,
            ]);

            // dd($request);
            return redirect()->back()->withErrors(['Done Add Vehicle.']);
        }
        elseif (Auth::user()->hasRole('Worker'))
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
                'available' =>'Available',
                'picture_path' =>$IMG_filename,
            ]);

            // dd($request);
            return redirect()->back()->withErrors(['Done Add Vehicle.']);

        }
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
