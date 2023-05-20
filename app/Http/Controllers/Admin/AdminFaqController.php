<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\faq;
use App\Models\pagefaqitem;

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


    public function index_faq_home(){
        $pagefaqitem = pagefaqitem::where('id' , 1)->first();
         return view('admin.page_faq' , compact('pagefaqitem'));
    }

    public function update_faq_home(Request $request , $id){

        $pagefaqitem = pagefaqitem::where('id' , $id)->first();

        $request->validate([
            'heading'=>'required'
       ]);


        $pagefaqitem->update([
            'heading'=>$request->heading,
            'title'=>$request->title,
            'meta_description'=>$request->meta_description
        ]);


        return redirect()->back()->with('succes' , 'Update Successfully');



    }

}
