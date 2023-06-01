<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagejobcategory extends Model
{
    protected $fillable = [
        'heading',
        'title',
        'meta_description'
    ];
}
