<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'year',
        'color',
        'capacity',
        'license number',
        'price',
        'description',
        'attashment',
        'available',
        'hidden',
        'picture path',
        ];
}
