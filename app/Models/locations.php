<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locations extends Model
{
    use HasFactory;

    protected $table = 'locations';
    protected $fillable = [
        'country_id',
        'city_id',
        'address_description',
        
        
        ];
}
