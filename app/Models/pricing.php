<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pricing extends Model
{
    protected $fillable = [
        'package_name',
        'package_price',
        'package_days',
        'package_display_time',
        'total_allowed_jobs',
        'total_allowed_featured_jobs',
        'total_allowed_photo',
        'total_allowed_video'  
    ];

}
