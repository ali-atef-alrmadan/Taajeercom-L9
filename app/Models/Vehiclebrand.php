<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiclebrand extends Model
{
    use HasFactory;

    protected $table = 'vehiclebrands';

    protected $fillable = [
        'brand',
        ];
}
