<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pageotheritem;
use App\Models\company;
use App\Models\Candidate;
use App\Mail\Websitemail;
use Hash;
use Auth;

class ForgetpasswordController extends Controller
{
    public function forget_password_company(){

        if(Auth::guard('Candidate')->check()){
            return redirect()->route('candidate_dashboard');
        }

        if(Auth::guard('company')->check()){
            return redirect()->route('company_dashboard');
        }

        $pageotheritem = pageotheritem::where('id' , 1)->first();
        return view('front.forget_password_company' , compact('pageotheritem'));

    }

    public function forget_password_company_submit(Request $request){

        $request->validate([
            'email' => 'required|email'
        ]);

        $company_data = company::where('email' , $request->email)->first();

        if(!$company_data){
            return redirect()->back()->with('error' , 'Email Addrees not found');
        }


        $token = hash('sha256' , time());

        $company_data->token =$token;
        $company_data->update();


        $reset_link = url('reset-password/company/'.$token.'/'.$request->email);
        $subject = "Reset Password";
        $message = 'Please click on the following link : <br>';
        $message =  '<a href="'.$reset_link.'">Click here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject , $message));

        return redirect()->route('login')->with('succes' , 'Please check your email and follow the steps there');

    }

    public function reset_password_company($token , $email ){

        $company_data = company::where('token' , $token)->where('email' , $email)->first();

        if(!$company_data){
            return redirect()->route('login');
        }

        return view('front.reset_password_company' , compact('company_data'));
    }


    public function reset_password_company_submit(Request $request , $token , $email){

        $request->validate([
            'password' => 'required',
            'retype_password'=>'required |same:password'
        ]);

        $hashedPassword = Hash::make($request->input('password'));

        $company_data = company::where('token' , $token)->where('email' , $email)->first();
        $company_data->update([
            'password'=>$hashedPassword,
            'token'=>''
        ]);

        return redirect()->route('login')->with('succes' , 'Password is reset successfully');

    }

    public function forget_password_candidate(){

        if(Auth::guard('Candidate')->check()){
            return redirect()->route('candidate_dashboard');
        }

        if(Auth::guard('company')->check()){
            return redirect()->route('company_dashboard');
        }
        

        $pageotheritem = pageotheritem::where('id' , 1)->first();

        return view('front.forget_password_candidate', compact('pageotheritem'));

    }



    public function forget_password_candidate_submit(Request $request){

        $request->validate([
            'email' => 'required|email'
        ]);

        $Candidate_data = Candidate::where('email' , $request->email)->first();

        if(!$Candidate_data){
            return redirect()->back()->with('error' , 'Email Addrees not found');
        }


        $token = hash('sha256' , time());

        $Candidate_data->token =$token;
        $Candidate_data->update();


        $reset_link = url('reset-password/candidate/'.$token.'/'.$request->email);
        $subject = "Reset Password";
        $message = 'Please click on the following link : <br>';
        $message =  '<a href="'.$reset_link.'">Click here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject , $message));

        return redirect()->route('login')->with('succes' , 'Please check your email and follow the steps there');

    }


    public function reset_password_candidate($token , $email){

        $Candidate_data = Candidate::where('token' , $token)->where('email' , $email)->first();

        if(!$Candidate_data){
            return redirect()->route('login');
        }

        return view('front.reset_password_Candidate' , compact('Candidate_data'));
    }


    public function reset_password_candidate_submit(Request $request , $token , $email){

        $request->validate([
            'password' => 'required',
            'retype_password'=>'required |same:password'
        ]);

        $hashedPassword = Hash::make($request->input('password'));

        $candidate_data = Candidate::where('token' , $token)->where('email' , $email)->first();

        $candidate_data->update([
            'password'=>$hashedPassword,
            'token'=>''
        ]);

        return redirect()->route('login')->with('succes' , 'Password is reset successfully');

    }


}
