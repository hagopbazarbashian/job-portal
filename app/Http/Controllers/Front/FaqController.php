<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\faq;
use App\Models\pagefaqitem;

class FaqController extends Controller
{
    public function index(){
        $faqs = faq::paginate();
        $pagefaqitem = pagefaqitem::where('id' , 1)->first();
        return view('front.faq' ,compact('faqs' , 'pagefaqitem'));
     }
}
