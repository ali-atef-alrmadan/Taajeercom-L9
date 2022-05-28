<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        "Start_date",
        "End_date",
        "Price",
        "vehicles_id",
        "user_id",
        "Status"
    ];


}
