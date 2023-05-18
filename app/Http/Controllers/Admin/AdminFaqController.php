<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\faq;

class AdminFaqController extends Controller
{
    public function index(){
        $faqs = faq::get();
        return view('admin.faq',compact('faqs'));
    }

    public function create(Request $request){

        return view('admin.faq_create');
    }

    public function store(Request $request){


        $request->validate([
            'question'=>'required',
            'answer'=>'required'
       ]);


         $faq = faq::create([
            'question'=>$request->question,
            'answer'=>$request->answer
        ]);



        return redirect()->route('admin_faq')->with('succes' , 'Created Successfully');

    }

    public function edit($id){
        $faq = faq::where('id' , $id)->first();
        return view('admin.faq_edit',compact('faq'));
    }

    public function update(Request $request , $id){

        $request->validate([
            'question'=>'required',
            'answer'=>'required'
       ]);

       $faq = faq::where('id' , $id)->first();

        $faq->update([
           'question'=>$request->question,
           'answer'=>$request->answer
        ]);

        return redirect()->route('admin_faq')->with('succes' , 'Update Successfully');

    }


    public function delete($id){
        $faq = faq::where('id' , $id)->first();
        faq::where('id' , $id)->delete();
        return redirect()->route('admin_faq')->with('succes' , 'Data is deleted Successfully');
    }

}
