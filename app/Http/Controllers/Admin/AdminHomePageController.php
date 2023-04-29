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

          'pagehomeitem'=>$pagehomeitem

        ]);
      }



     public function update(Request $request , $id){

        $pagehomeitem =  page_home_item::where('id' , $id)->first();

        $pagehomeitem->update([
            'heading'=>$request->heading,
            'text'=>$request->text,
            'job_title'=>$request->job_title,
            'job_location'=>$request->job_location,
            'job_category'=>$request->job_category,
            'search'=>$request->job_category,
            'background'
        ]);

     }
}
