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

        $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
            ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
            ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
            ->join('locations','locations.id', '=', 'offices.location_id')
            ->join('countries','countries.id', '=','locations.country_id' )
            ->join('cities','cities.id', '=', 'locations.city_id')
            ->select('locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','vehicles.picture_path','vehicles.price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.capacity','vehicles.id',)
            ->where('vehicles.available','=',1)
            ->paginate(12);
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $cities= Cities::all();
        $brands= Vehiclebrand::all();
        
        if($request->date_from != null 
        && $request->date_to != null
        && $request->max_price != 0 
        && $request->min_price != 0
        && $request->location != 0
        && $request->brand != 0
        )
        {
            $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
                ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
                ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
                ->join('locations','locations.id', '=', 'offices.location_id')
                ->join('countries','countries.id', '=','locations.country_id' )
                ->join('cities','cities.id', '=', 'locations.city_id')
                ->select('locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','vehicles.picture_path','vehicles.price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.capacity','vehicles.id',)
                ->where('vehicles.available','=',1)
                ->whereBetween('vehicles.price', [$request->min_price, $request->max_price])
                ->where('cities.id','=',$request->location)
                ->where('vehiclebrands.id','=',$request->brand)
                ->paginate(12);

        return view('home',compact('cities','brands','vehicles'));
        }
            
        elseif($request->max_price != 0 
        && $request->min_price != 0
        && $request->location != 0
        && $request->brand != 0
        )
        {
            $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
                ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
                ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
                ->join('locations','locations.id', '=', 'offices.location_id')
                ->join('countries','countries.id', '=','locations.country_id' )
                ->join('cities','cities.id', '=', 'locations.city_id')
                ->select('locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','vehicles.picture_path','vehicles.price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.capacity','vehicles.id',)
                ->where('vehicles.available','=',1)
                ->whereBetween('vehicles.price', [$request->min_price, $request->max_price])
                ->where('cities.id','=',$request->location)
                ->where('vehiclebrands.id','=',$request->brand)
                ->paginate(12);

            return view('home',compact('cities','brands','vehicles'));
        }

        elseif($request->max_price != 0 
        && $request->min_price != 0)
        {
            $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
                ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
                ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
                ->join('locations','locations.id', '=', 'offices.location_id')
                ->join('countries','countries.id', '=','locations.country_id' )
                ->join('cities','cities.id', '=', 'locations.city_id')
                ->select('locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','vehicles.picture_path','vehicles.price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.capacity','vehicles.id',)
                ->where('vehicles.available','=',1)
                ->whereBetween('vehicles.price', [$request->min_price, $request->max_price])
                ->paginate(12);

            return view('home',compact('cities','brands','vehicles'));
        }
            
        elseif( $request->max_price != 0 
        && $request->location != 0
        && $request->brand != 0)
        {
            $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
                ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
                ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
                ->join('locations','locations.id', '=', 'offices.location_id')
                ->join('countries','countries.id', '=','locations.country_id' )
                ->join('cities','cities.id', '=', 'locations.city_id')
                ->select('locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','vehicles.picture_path','vehicles.price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.capacity','vehicles.id',)
                ->where('vehicles.available','=',1)
                ->whereBetween('vehicles.price', [0, $request->max_price])
                ->where('cities.id','=',$request->location)
                ->where('vehiclebrands.id','=',$request->brand)
                ->paginate(12);

            return view('home',compact('cities','brands','vehicles'));
        }
            
        elseif($request->min_price != 0
        && $request->location != 0
        && $request->brand != 0)
        {
            $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
                ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
                ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
                ->join('locations','locations.id', '=', 'offices.location_id')
                ->join('countries','countries.id', '=','locations.country_id' )
                ->join('cities','cities.id', '=', 'locations.city_id')
                ->select('locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','vehicles.picture_path','vehicles.price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.capacity','vehicles.id',)
                ->where('vehicles.available','=',1)
                ->whereBetween('vehicles.price', [$request->min_price, 10000000])
                ->where('cities.id','=',$request->location)
                ->where('vehiclebrands.id','=',$request->brand)
                ->paginate(12);

            return view('home',compact('cities','brands','vehicles'));
        }
            
        elseif($request->location != 0
        && $request->brand != 0)
        {
            $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
                ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
                ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
                ->join('locations','locations.id', '=', 'offices.location_id')
                ->join('countries','countries.id', '=','locations.country_id' )
                ->join('cities','cities.id', '=', 'locations.city_id')
                ->select('locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','vehicles.picture_path','vehicles.price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.capacity','vehicles.id',)
                ->where('vehicles.available','=',1)
                ->where('cities.id','=',$request->location)
                ->where('vehiclebrands.id','=',$request->brand)
                ->paginate(12);

            return view('home',compact('cities','brands','vehicles'));
        }
            
        elseif($request->brand != 0)
        {
            $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
                ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
                ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
                ->join('locations','locations.id', '=', 'offices.location_id')
                ->join('countries','countries.id', '=','locations.country_id' )
                ->join('cities','cities.id', '=', 'locations.city_id')
                ->select('locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','vehicles.picture_path','vehicles.price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.capacity','vehicles.id',)
                ->where('vehicles.available','=',1)
                ->where('vehiclebrands.id','=',$request->brand)
                ->paginate(12);

            return view('home',compact('cities','brands','vehicles'));
        }
            
        elseif($request->location != 0)
        {
            $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
                ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
                ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
                ->join('locations','locations.id', '=', 'offices.location_id')
                ->join('countries','countries.id', '=','locations.country_id' )
                ->join('cities','cities.id', '=', 'locations.city_id')
                ->select('locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','vehicles.picture_path','vehicles.price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.capacity','vehicles.id',)
                ->where('vehicles.available','=',1)
                ->where('cities.id','=',$request->location)
                ->paginate(12);

            return view('home',compact('cities','brands','vehicles'));
        }
            
        elseif($request->min_price != 0)
        {
            $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
                ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
                ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
                ->join('locations','locations.id', '=', 'offices.location_id')
                ->join('countries','countries.id', '=','locations.country_id' )
                ->join('cities','cities.id', '=', 'locations.city_id')
                ->select('locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','vehicles.picture_path','vehicles.price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.capacity','vehicles.id',)
                ->where('vehicles.available','=',1)
                ->whereBetween('vehicles.price', [$request->min_price, 100000000])
                ->paginate(12);

            return view('home',compact('cities','brands','vehicles'));
        }
            
        elseif($request->max_price != 0 )
        {
            $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
                ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
                ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
                ->join('locations','locations.id', '=', 'offices.location_id')
                ->join('countries','countries.id', '=','locations.country_id' )
                ->join('cities','cities.id', '=', 'locations.city_id')
                ->select('locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','vehicles.picture_path','vehicles.price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.capacity','vehicles.id',)
                ->where('vehicles.available','=',1)
                ->whereBetween('vehicles.price', [0, $request->max_price])
                ->paginate(12);

            return view('home',compact('cities','brands','vehicles'));
        }
            
        else
        {
            $vehicles= Vehicles::join('offices','offices.id', '=', 'vehicles.owner_id')
                ->join('vehiclebrands','vehiclebrands.id', '=', 'vehicles.brand_id')
                ->join('vehicletypes','vehicletypes.id', '=', 'vehicles.type_id')
                ->join('locations','locations.id', '=', 'offices.location_id')
                ->join('countries','countries.id', '=','locations.country_id' )
                ->join('cities','cities.id', '=', 'locations.city_id')
                ->select('locations.address_description','cities.city','vehiclebrands.brand','vehicletypes.type','offices.name','vehicles.picture_path','vehicles.price','vehicles.year','vehicles.color','vehicles.capacity','vehicles.capacity','vehicles.id',)
                ->where('vehicles.available','=',1)
                ->paginate(12);

            return view('home',compact('cities','brands','vehicles'));
        }        
        
    }


}
