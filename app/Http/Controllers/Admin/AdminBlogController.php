<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pageblogitems;

class AdminBlogController extends Controller
{
     public  function index_blog_home(){
        $pageblogitem = pageblogitems::where('id' , 1)->first();
         return view('admin.page_blog' , compact('pageblogitem'));
     }

     public function update_blog_home(Request $request , $id){

        $pageblogitem = pageblogitems::where('id' , $id)->first();

        $pageblogitem->update([
            'heading'=>$request->heading,
            'title'=>$request->title,
            'meta_description'=>$request->meta_description
        ]);

        return redirect()->route('admin_blog_page')->with('succes' , 'Created Successfully');


     }
}
