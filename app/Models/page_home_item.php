<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page_home_item extends Model
{
    protected $fillable = [
        'heading',
        'text',
        'job_title',
        'job_location',
        'job_category',
        'search',
        'background'
    ];
}
