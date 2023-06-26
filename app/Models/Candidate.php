<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'name',
        'description',
        'username',
        'email',
        'password',
        'token',
        'photo',
        'biography',
        'phone',
        'address',
        'state',
        'city',
        'zip_code',
        'gender',
        'medical_status',
        'date_of_birth',
        'website',
        'status'
    ];
}
