<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pageotheritem;
use App\Models\company;
use App\Models\Candidate;
use App\Http\Requests\CandidateLoginRequest;
use Hash;
use Auth;

class LoginController extends Controller
{
     public function index(){

        if(Auth::guard('Candidate')->check()){
            return redirect()->route('candidate_dashboard');
        }

        if(Auth::guard('company')->check()){
            return redirect()->route('company_dashboard');
        }
        
        $pageotheritem = pageotheritem::where('id' , 1)->first();
        return view('front.login' , compact('pageotheritem'));

     }

     public function company_login_submit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::guard('company')->attempt($credential)) {
            return redirect()->route('company_dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Information is not correct!');
        }
    }

    public function company_logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('login');
    }



    public function candidate_login_submit(Request $request){

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        if (Auth::guard('Candidate')->attempt($credentials)) {
            return redirect()->route('candidate_dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Incorrect login information');
        }

    }

    public function candidate_logout(){
        Auth::guard('Candidate')->logout();
        return redirect()->route('login');
    }
}
