<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class offices extends Model
{
    use HasFactory;

    protected $table = 'offices';

    protected $fillable = [
        'admin_id',
        'location_id',
        'name',
        'phone_number',
        'description',
        ];
}
