<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offcesworkers extends Model
{
    use HasFactory;

    protected $table = 'offcesworkers';

    protected $fillable = ["
    'user_id',
    'office_id',
    "];
}
