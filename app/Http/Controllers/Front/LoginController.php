<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pageotheritem;
use App\Models\company;
use Hash;
use Auth;

class LoginController extends Controller
{
     public function index(){
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
}
