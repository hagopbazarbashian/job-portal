<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pagejobcategory;

class AdminJobCategoryItem extends Controller
{
    public function index_job_category_home(){

        $pagejobcategory = pagejobcategory::where('id' , 1)->first();
        return view('admin.page_job_category' , compact('pagejobcategory'));
    }

    public function update_job_category_home(Request $request , $id){

        $pagejobcategory = pagejobcategory::where('id' , $id)->first();

        $request->validate([
            'heading'=>'required',
            'content'=>'required'
       ]);


        $pagejobcategory->update([
            'heading'=>$request->heading,
            'content'=>$request->content,
            'title'=>$request->title,
            'meta_description'=>$request->meta_description
        ]);


        return redirect()->back()->with('succes' , 'Update Successfully');



    }
}
