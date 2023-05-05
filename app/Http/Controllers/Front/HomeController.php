<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\page_home_item;
use App\Models\JobCategory;

class HomeController extends Controller
{
    public function index(){
        $page_home_data = page_home_item::where('id' , 1)->first();
        $jobCategorys = JobCategory::orderBy('name' , 'asc')->take(9)->get();

        return view('front.home', compact('page_home_data', 'jobCategorys'));
    }
}
