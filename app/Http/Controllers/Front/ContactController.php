<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use App\Models\contact;
use App\Models\Admin;

class ContactController extends Controller
{
     public function index(){
        $contact = contact::where('id' , 1)->first();
          return view('front.contact' ,compact('contact'));
     }

     public function submit_contact(Request $request){

        $admin_data = Admin::where('id' , 1)->first();

        $request->validate([
            'person_name'=>'required',
            'person_email'=>'required|email',
            'person_message'=>'required'
       ]);


        $subject = "Contact From Message";
        $message = 'Visiter Information: <br>';
        $message =  'Name: '  .$request->person_name. '<br>';
        $message =  'Email: '  .$request->person_email. '<br>' ;
        $message =  'Message: ' .$request->person_message;

       \Mail::to($admin_data->email)->send(new Websitemail($subject , $message));

       return redirect()->back()->with('succes' , 'Email is send Successfully we will contact you soon');
     }


}
