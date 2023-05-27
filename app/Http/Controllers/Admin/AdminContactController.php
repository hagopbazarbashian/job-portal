<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact;

class AdminContactController extends Controller
{
    public function index_contact_home(){
        $contact = contact::where('id' , 1)->first();
        return view('admin.page_contact' , compact('contact'));
    }

    public function update_contact_home(Request $request , $id){

        $contact = contact::where('id' , $id)->first();

        $request->validate([
            'heading'=>'required',
       ]);


        $contact->update([
            'heading'=>$request->heading,
            'map_code'=>$request->map_code,
            'title'=>$request->title,
            'meta_description'=>$request->meta_description
        ]);


        return redirect()->back()->with('succes' , 'Update Successfully');



    }
}
