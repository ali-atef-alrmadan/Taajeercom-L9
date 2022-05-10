<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offices extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'location_id',
        'name',
        'phone_number',
        'description',
        
        ];
}
