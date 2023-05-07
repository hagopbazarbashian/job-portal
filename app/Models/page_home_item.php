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
        'background',
        'job_category_heading',
        'job_category_subheading',
        'job_category_status',
        'why_choose_heading',
        'why_choose_subheading',
        'why_choose_background',
        'why_choose_status',
        'featured_jobs_heading',
        'featured_jobs_subheading',
        'featured_jobs_status' 
    ];
}
