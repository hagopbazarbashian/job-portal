<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;


class AdminJobCategoryController extends Controller
{
    public function index(){

        $jobcategorys = JobCategory::get();
        return view('admin.job_category',compact('jobcategorys'));
    }


    public function create(Request $request){

        return view('admin.job_category_create');
    }
 
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'icon'=>'required'
       ]);

       JobCategory::create([
        'name'=>$request->name,
        'icon'=>$request->icon
       ]);

       return redirect()->route('admin_job_category')->with('succes' , 'Data Save Successfully');


    }

    public function edit($id){
        $jobCategory = JobCategory::where('id' , $id)->first();
        return view('admin.job_category_edit',compact('jobCategory'));
    }

    public function update(Request $request , $id){
        $request->validate([
            'name'=>'required',
            'icon'=>'required'
       ]);

        $jobCategory = JobCategory::where('id' , $id)->first();

        $jobCategory->update([
           'name'=>$request->name,
           'icon'=>$request->icon
        ]);

        return redirect()->route('admin_job_category')->with('succes' , 'Update Successfully');

    }

    public function delete($id){
        $jobCategory = JobCategory::where('id' , $id)->delete();
        return redirect()->route('admin_job_category')->with('succes' , 'Data is deleted Successfully');
    }

}
