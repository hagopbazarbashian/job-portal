<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact;

class ContactController extends Controller
{
     public function index(){
        $contact = contact::where('id' , 1)->first();
          return view('front.contact' ,compact('contact'));
     }

     public function submit_contact(Request $request){
        return "text";
     }


}
