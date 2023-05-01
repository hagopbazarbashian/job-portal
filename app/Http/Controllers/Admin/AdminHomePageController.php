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
            'search'=>'required'
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

        $pagehomeitem->save();


        $pagehomeitem->update([
            'heading'=>$request->heading,
            'text'=>$request->text,
            'job_title'=>$request->job_title,
            'job_location'=>$request->job_location,
            'job_category'=>$request->job_category,
            'search'=>$request->job_category
        ]);

        return redirect()->back()->with('succes' , 'Successfully updated');

     }
}
