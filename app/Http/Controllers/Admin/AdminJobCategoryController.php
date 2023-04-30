<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;


class AdminJobCategoryController extends Controller
{
     public function index(){
        $jobcategory = JobCategory::get();

        return view('admin.job_category',compact('jobcategory'));
     }
}
 