<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OfficesController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\OffcesworkersController;
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

Route::get('/', function () {
    return view('welcome');
});
//
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::group(['middleware'=>['auth']],function (){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    // Add To Office

    Route::get('AddToOffice',[OfficesController::class,'index'])->name('AddToOffice');
    Route::post('AddToOffice',[OfficesController::class,'store'])->name('storeAddToOffice');

    // Add vehicle

    Route::get('Addvehicle',[VehiclesController::class,'index'])->name('Addvehicle');
    Route::post('Addvehicle',[VehiclesController::class,'store'])->name('storeAddvehicle');

    // Add  Worker

    Route::get('AddWorker',[OffcesworkersController::class,'index'])->name('AddWorker');
    Route::post('AddWorker',[OffcesworkersController::class,'store'])->name('storeAddWorker');

    // Accept for Offices

    Route::get('AcceptforOffices',[OfficesController::class,'show'])->name('AcceptforOffices');
    Route::post('AcceptforOffices',[OfficesController::class,'update'])->name('updateAcceptforOffices');


});





