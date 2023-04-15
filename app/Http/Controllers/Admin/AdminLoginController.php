<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\Websitemail;
use Hash;
use Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function forget_password()
    {
        return view('admin.forget_password');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('admin')->attempt($credential)) {
            return redirect()->route('admin_home');
        } else {
            return redirect()->route('admin_login')->with('error', 'Information is not correct!');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();  
        return redirect()->route('admin_login');
    }


    public function forget_password_submit(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $admin_data = Admin::where('email' , $request->email)->first();

        if(!$admin_data){
            return rdeirect()->back()->with('error' , 'Email Addrees not found');
        }


        $token = hash('sha256' , time());
        $reset_link = url('/admin/reset-password/'.$token.'/'.$request->email);
        $subject = "Reset Password";
        $message = 'Please click on the following link : <br>';
        $message =  '<a href="'.$reset_link.'">Click here</a>';

        
    }
}
