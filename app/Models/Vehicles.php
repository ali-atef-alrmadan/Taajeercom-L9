<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicles extends Model
{
    use HasFactory;

    protected $table = 'vehicles';

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
        'available',
        'picture_path',
        ];

}
