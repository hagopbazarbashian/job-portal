<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'company_id',
        'packeage_id',
        'order_no',
        'paid_amount',
        'start_date',
        'expire_date',
        'currently_active'
    ];
}
