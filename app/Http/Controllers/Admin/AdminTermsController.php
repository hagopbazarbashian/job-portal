<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\term;

class AdminTermsController extends Controller
{
    public function index_terms_home(){
        $term = term::where('id' , 1)->first();
        return view('admin.page_terms' , compact('term'));
    }

    public function update_terms_home(Request $request , $id){

        $term = term::where('id' , $id)->first();

        $request->validate([
            'heading'=>'required',
            'content'=>'required'
       ]);


        $term->update([
            'heading'=>$request->heading,
            'content'=>$request->content, 
            'title'=>$request->title,
            'meta_description'=>$request->meta_description
        ]);


        return redirect()->back()->with('succes' , 'Update Successfully');



    }

}
