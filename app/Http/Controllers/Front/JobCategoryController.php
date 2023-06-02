<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;
use App\Models\pagejobcategory;

class JobCategoryController extends Controller
{
     public function categories(){
        $jobCategorys = JobCategory::orderBy('name' , 'asc')->get();
        $pagejobcategory = pagejobcategory::where('id' , 1)->first();
        return view('front.job_categories' , compact('jobCategorys','pagejobcategory'));

     }
}
