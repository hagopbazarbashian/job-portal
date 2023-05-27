<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfile;
use App\Models\Admin;
use Hash;
use Auth;

class AdminProfileController extends Controller
{
     public function index(){
        return view('admin.layout.profile');
     }

     public function profile_submit(UpdateProfile $request){
        $admin_data = Admin::where('email' , $request->email)->first();

        if($request->password!=''){
            $request->validate([
                'password'=>'required',
                'retype_password'=>'required|same:password'
            ]);

            $admin_data->update([
                'password'=>Hash::make($request->password)
            ]);

        }

        $admin_data->update([
            'name'=>$request->name, 
            'email'=>$request->email
        ]);



        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();

            unlink(public_path('uploads/' . $admin_data->photo));

            $image->move(public_path('uploads'), $filename);
            $admin_data->update([
                'photo'=>$filename
            ]);
        }

        return redirect()->back()->with('succes' , 'successfully change your  profile image');









     }
}
