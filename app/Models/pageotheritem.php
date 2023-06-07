<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pageotheritem extends Model
{
    protected $fillable = [
        'login_page_heading',
        'login_page_title',
        'login_page_meta_description',
        'signup_page_heading',
        'signup_page_title',
        'signup_page_meta_description',
        'forget_password_page_heading',
        'forget_password_page_title',
        'forget_password_page_meta_description'
    ];
}
