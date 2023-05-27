<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\term;

class TermsController extends Controller
{
    public function index(){
        $term = term::where('id' , 1)->first();
        return  view('front.terms' , compact('term'));
    }
}
