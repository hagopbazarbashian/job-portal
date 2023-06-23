<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class company extends Authenticatable
{
    protected $fillable = [
        'company_name',
        'person_name',
        'username',
        'email',
        'password',
        'token',
        'logo',
        'phone',
        'address',
        'country',
        'website',
        'company_size',
        'founded_on',
        'industry_id',
        'description',
        'oh_mon',
        'oh_tue',
        'oh_wed',
        'oh_thu',
        'oh_fri',
        'oh_sat',
        'oh_sun',
        'map_code',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'status'
    ];
}
