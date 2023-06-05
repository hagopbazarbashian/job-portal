<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pricing;

class PackageController extends Controller
{
    public function index(){
        $pricings = pricing::get();
        return view('front.package' , compact('pricings'));
    }
}
