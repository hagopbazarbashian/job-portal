<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pageotheritem;

class SignupController extends Controller
{
    public function index(){
        $pageotheritem = pageotheritem::where('id' , 1)->first();
        return view('front.signup' , compact('pageotheritem'));

    }

    public function company_submit(Request $request){

    }
}