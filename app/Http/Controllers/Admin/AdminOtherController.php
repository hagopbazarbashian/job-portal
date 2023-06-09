<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pageotheritem;

class AdminOtherController extends Controller
{
    public function index(){
        $pageotheritem = pageotheritem::where('id' , 1)->first();
         return view('admin.page_other' , compact('pageotheritem'));
    }

    public function update(Request $request , $id){

        $pageotheritem = pageotheritem::where('id' , $id)->first();

        $request->validate([
            'login_page_heading'=>'required',
            'login_page_title'=>'required',
            'login_page_meta_description'=>'required',
            'signup_page_heading'=>'required',
            'signup_page_title'=>'required',
            'signup_page_meta_description'=>'required',
            'forget_password_page_heading'=>'required',
            'forget_password_page_title'=>'required',
            'forget_password_page_meta_description'=>'required'
       ]);


        $pageotheritem->update([
            'login_page_heading'=>$request->login_page_heading,
            'login_page_title'=>$request->login_page_title,
            'login_page_meta_description'=>$request->login_page_meta_description,
            'signup_page_heading'=>$request->signup_page_heading,
            'signup_page_title'=>$request->signup_page_title,
            'signup_page_meta_description'=>$request->signup_page_meta_description,
            'forget_password_page_heading'=>$request->forget_password_page_heading,
            'forget_password_page_title'=>$request->forget_password_page_title,
            'forget_password_page_meta_description'=>$request->forget_password_page_meta_description

        ]);


        return redirect()->back()->with('succes' , 'Update Successfully');



    }
}
