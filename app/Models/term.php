<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class term extends Model
{
    protected $fillable = [
        'heading',
        'content',
        'title',
        'meta_description'
    ];
}
