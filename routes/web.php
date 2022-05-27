<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfficesController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\OffcesworkersController;
use App\Http\Controllers\ReservationsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('AddToOffice',[OfficesController::class,'index'])->name('AddToOffice');

    Route::middleware(['auth:sanctum','role:User|Worker|Office-Admin|Admin',config('jetstream.auth_session'),'verified'])->group(function () {

        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    });
    Route::middleware(['auth:sanctum','role:Admin',config('jetstream.auth_session'),'verified'])->group(function () {
    
        // Accept for Offices
        Route::get('AcceptforOffices',[OfficesController::class,'show'])->name('AcceptforOffices');
        Route::post('AcceptforOffices',[OfficesController::class,'update'])->name('updateAcceptforOffices');
    
    });

    Route::middleware(['auth:sanctum','role:Office-Admin',config('jetstream.auth_session'),'verified'])->group(function () {
    
        // Add  Worker

        Route::get('AddWorker',[OffcesworkersController::class,'index'])->name('AddWorker');
        Route::post('AddWorker',[OffcesworkersController::class,'store'])->name('storeAddWorker');

        Route::get('EditWorker',[OffcesworkersController::class,'edit'])->name('EditWorker');
        
        // Route::post('DeleteWorker',[OffcesworkersController::class,'update'])->name('DeleteWorker');
        Route::post('DeWorker',[OffcesworkersController::class,'update'])->name('storeDeWorker');

    
    });
    
    Route::middleware(['auth:sanctum','role:Office-Admin|Worker',config('jetstream.auth_session'),'verified'])->group(function () {
    
            // Add vehicle

        Route::get('Addvehicle',[VehiclesController::class,'index'])->name('Addvehicle');
        Route::post('Addvehicle',[VehiclesController::class,'store'])->name('storeAddvehicle');

        Route::get('Viewvehicle',[VehiclesController::class,'View'])->name('Viewvehicle');

        Route::get('EditVehicle',[VehiclesController::class,'edit'])->name('EditVehicle');
        Route::post('SaveEditVehicle',[VehiclesController::class,'update'])->name('SaveEditVehicle');
        Route::post('DeleteVehicle',[VehiclesController::class,'DeleteVehicle'])->name('DeleteVehicle');

    });
    
    Route::middleware(['auth:sanctum','role:User',config('jetstream.auth_session'),'verified'])->group(function () {
        // Route::get('WorkerView',[WorkerController::class,'show'])->name('WorkerView');
        // Route::get('/search',[WorkerController::class, 'search'])->name('search');
        // Add To Office
        
        Route::post('AddToOffice',[OfficesController::class,'store'])->name('storeAddToOffice');

        Route::get('Reservation',[ReservationsController::class,'index'])->name('Reservation');
        Route::post('AcceptReservation',[ReservationsController::class,'show'])->name('AcceptReservation');
        Route::post('storeAcceptReservation',[ReservationsController::class,'store'])->name('storeAcceptReservation');
       

    
    });
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('AddToOffice',[OfficesController::class,'index'])->name('AddToOffice');

});


