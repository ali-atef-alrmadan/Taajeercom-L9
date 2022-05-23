<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'brand_id',
        'type_id',
        'model',
        'year',
        'color',
        'capacity',
        'license_number',
        'price',
        'description',
        'attashment',
        'available',
        'hidden',
        'picture_path',
        ];
}
