<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\privacy;
 
class AdminPrivacyPageController extends Controller
{
    public function index_privacy_home(){
        $privacy = privacy::where('id' , 1)->first();
        return view('admin.page_privacy' , compact('privacy'));
    }

    public function update_privacy_home(Request $request , $id){

        $privacy = privacy::where('id' , $id)->first();

        $request->validate([
            'heading'=>'required',
            'content'=>'required'
       ]);


        $privacy->update([
            'heading'=>$request->heading,
            'content'=>$request->content,
            'title'=>$request->title,
            'meta_description'=>$request->meta_description
        ]);


        return redirect()->back()->with('succes' , 'Update Successfully');



    }
}
