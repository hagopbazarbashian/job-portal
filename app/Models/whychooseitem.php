<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class whychooseitem extends Model
{
    protected $fillable = [
        'icon',
        'heading',
        'text'
    ];
}
