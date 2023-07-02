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
        'payment_method',
        'start_date',
        'expire_date',
        'currently_active'
    ];


    public function rCompany(){
        return $this->belongsTo(company::class , 'company_id');
    }

    public function rPricing(){
        return $this->belongsTo(pricing::class , 'packeage_id');
    }
}
