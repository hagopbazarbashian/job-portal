<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testmonials extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'comment',
        'photo'
    ];

}
