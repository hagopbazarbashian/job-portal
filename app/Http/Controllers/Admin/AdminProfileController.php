<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfile;

class AdminProfileController extends Controller
{
     public function index(){
        return view('admin.layout.profile');
     }

     public function profile_submit(UpdateProfile $request){

        if($request->password!=''){
            $request->validate([
                'password'=>'required',
                'retype_password'=>'required|same:password'
            ]);
        }

     }
}
