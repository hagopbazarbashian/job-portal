<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\page_home_item;

class AdminHomePageController extends Controller
{
     public function index(){

       $pagehomeitem =  page_home_item::where('id' , 1)->first();

        return view('admin.page_home')->with([

          'pagehomeitem'=>$pagehomeitem,

        ]);
      }



     public function update(Request $request , $id){

      $request->validate([
            'heading'=>'required',
            'text'=>'required',
            'job_title'=>'required',
            'job_location'=>'required',
            'job_category'=>'required',
            'search'=>'required',
            'job_category_heading'=>'required',
            'job_category_subheading'=>'required',
            'why_choose_heading'=>'required',
            'why_choose_status'=>'required'
        ]);

        $pagehomeitem =  page_home_item::where('id' , $id)->first();

        if($request->hasFile('background')) {

            $image = $request->file('background');
            $fileName = $image->hashName();
            $image->move(public_path('uploads'), $fileName);

            $pagehomeitem->background = $fileName;

            if (file_exists(public_path($pagehomeitem->background))) {
              unlink(public_path($pagehomeitem->background));
            }

        }

        if($request->hasFile('background')) {

            $image = $request->file('background');
            $fileName = $image->hashName();
            $image->move(public_path('uploads'), $fileName);

            $pagehomeitem->background = $fileName;

            if (file_exists(public_path($pagehomeitem->background))) {
              unlink(public_path($pagehomeitem->background));
            }

        }


        $pagehomeitem->save();


        $pagehomeitem->update([
            'heading'=>$request->heading,
            'text'=>$request->text,
            'job_title'=>$request->job_title,
            'job_location'=>$request->job_location,
            'job_category'=>$request->job_category,
            'search'=>$request->job_category,
            'job_category_heading'=>$request->job_category_heading,
            'job_category_subheading'=>$request->job_category_subheading,
            'job_category_status'=>$request->job_category_status,

            'why_choose_heading'=>$request->why_choose_heading,
            'why_choose_subheading'=>$request->why_choose_subheading,
            'why_choose_background'=>$request->why_choose_status
        ]);

        return redirect()->back()->with('succes' , 'Data is updated  Successfully');

     }
}
