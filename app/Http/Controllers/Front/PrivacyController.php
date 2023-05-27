<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\privacy;

class PrivacyController extends Controller
{
    public function index(){
        $privacy = privacy::where('id' , 1)->first();

        return view('front.privacy',compact('privacy'));

    }
}
