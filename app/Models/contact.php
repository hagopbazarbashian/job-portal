<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $fillable = [
        'heading',
        'map_code',
        'title',
        'meta_description'
    ];
}
