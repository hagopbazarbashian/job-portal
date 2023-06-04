<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pricing;

class AdminPackageController extends Controller
{
    public function index(){
        $pricings = pricing::get();
        return view('admin.pricing',compact('pricings'));
    }

    public function create(Request $request){

        return view('admin.package_create');
    }

    public function store(Request $request){


        $request->validate([
            'package_name'=>'required',
            'package_price'=>'required',
            'package_days'=>'required',
            'package_display_time'=>'required',
            'total_allowed_jobs'=>'required',
            'total_allowed_featured_jobs'=>'required',
            'total_allowed_photo'=>'required',
            'total_allowed_video'=>'required',
       ]);


         $faq = pricing::create([
            'package_name'=>$request->package_name,
            'package_price'=>$request->package_price,
            'package_days'=>$request->package_days,
            'package_display_time'=>$request->package_display_time,
            'total_allowed_jobs'=>$request->total_allowed_jobs,
            'total_allowed_featured_jobs'=>$request->total_allowed_featured_jobs,
            'total_allowed_photo'=>$request->total_allowed_photo,
            'total_allowed_video'=>$request->total_allowed_video
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
