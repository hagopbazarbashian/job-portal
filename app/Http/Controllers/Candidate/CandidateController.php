<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use Auth;

class CandidateController extends Controller
{
    public function dashboard(){

        if(Auth::guard('Candidate')->user()->status == 1){
            return redirect()->back()->with('error' , 'your email address has not been verified');
          }else{
           return view('candidate.dashboard');
         }

    }



}
