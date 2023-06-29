<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\company;
use Auth;

class CompanyController extends Controller
{
     public function dashboard(){
       if(Auth::guard('company')->user()->status == 1){
         return redirect()->back()->with('error' , 'your email address has not been verified');
       }else{
        return view('company.dashboard');
       }

     }


     public function make_payment(){
        
        return view('company.make_payment');
     }
}
