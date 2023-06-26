<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use App\Models\pageotheritem;
use App\Models\company;
use App\Models\Candidate;
use App\Http\Requests\CandidateSubmitrequest;
use Hash;
use Auth;

class SignupController extends Controller
{
    public function index(){
        $pageotheritem = pageotheritem::where('id' , 1)->first();
        return view('front.signup' , compact('pageotheritem'));

    }

    public function company_submit(Request $request){

        $request->validate([
            'company_name'=>'required',
            'person_name'=>'required',
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'retype_password'=>'required'
       ]);

       $hashedPassword = Hash::make($request->input('password'));
       $token = hash('sha256' , time());

       $company = company::create([
            'company_name'=>$request->input('company_name'),
            'person_name'=>$request->input('person_name'),
            'username'=>$request->input('username'),
            'email'=>$request->input('email'),
            'password'=>$hashedPassword,
            'token'=>$token,
            'status'=>1

       ]);

        $reset_link = url('company-signup-verifiy/'.$token.'/'.$request->email);
        $subject = "Company Signup Verification";
        $message = 'Please click on the following link : <br>';
        $message =  '<a href="'.$reset_link.'">Click here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject , $message));

       return redirect()->route('login')->with('succes' , 'An email send to your address. you must have to check that and click on the confermation link to validation your signup.');

    }


     public function company_signup_verifiy($token , $email){

        $company_data = company::where('token' , $token)->where('email' , $email)->first();

        if(!$company_data){
            return redirect()->route('login');
        }

        $company_data->update([
           'token'=>'',
           'status'=>0
        ]);
        return redirect()->route('login')->with('succes' , 'your email is verified successfully you can now login to the system as company.');

     }


     public function candidate_submit(CandidateSubmitrequest $request){

       $hashedPassword = Hash::make($request->input('password'));
       $token = hash('sha256' , time());

        Candidate::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$hashedPassword,
            'token'=>$token,
            'status'=>1
        ]);

        $reset_link = url('candidate-signup-verifiy/'.$token.'/'.$request->email);
        $subject = "Candidate Signup Verification Please <br> click on the following link";
        $message = 'Please click on the following link : <br>';
        $message =  '<a href="'.$reset_link.'">Click here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject , $message));


        return redirect()->route('login')->with('succes' , 'An email send to your address. you must have to check that and click on the confermation link to validation your signup.');

     }

     public function candidate_signup_verifiy($token , $email){

        $Candidate_data = Candidate::where('token' , $token)->where('email' , $email)->first();

        if(!$Candidate_data){
            return redirect()->route('login');
        }

        $Candidate_data->update([
           'token'=>'',
           'status'=>0
        ]);
        return redirect()->route('login')->with('succes' , 'your email is verified successfully you can now login to the system as company.');

     }
}
