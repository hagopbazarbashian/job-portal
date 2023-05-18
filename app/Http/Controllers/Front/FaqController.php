<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\faq;

class FaqController extends Controller
{
    public function index(){
        $faqs = faq::paginate();
        return view('front.faq' ,compact('faqs'));
     }
}
