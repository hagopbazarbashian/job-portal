<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pageblogitems extends Model
{
    protected $fillable = [
        'heading',
        'title',
        'meta_description'
    ];
}
