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

   

     public function update(Request $request){

     }
}
