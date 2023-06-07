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
            'heading'=>'required'
       ]);


        $pageotheritem->update([
            'heading'=>$request->heading,
            'title'=>$request->title,
            'meta_description'=>$request->meta_description
        ]);


        return redirect()->back()->with('succes' , 'Update Successfully');



    }
}
