<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\testmonials;

class TestMonialsController extends Controller
{
    public function index(){
        $testmonials = testmonials::get();
        return view('admin.testmonial',compact('testmonials'));
    }

    public function create(Request $request){

        return view('admin.test_monial_create');
    }


    public function store(Request $request){


        $request->validate([
            'name'=>'required',
            'designation'=>'required'
       ]);


         $testmonials = testmonials::create([
            'name'=>$request->name,
            'designation'=>$request->designation,
            'comment'=>$request->comment
        ]);

        $monials = testmonials::where('id' , $testmonials->id)->first();


        $image = $request->file('photo');
        $fileName = $image->hashName();
        $image->move(public_path('uploads'), $fileName);

        $monials->update([
            'photo'=>$fileName
        ]);

        return redirect()->route('admin_test_monials')->with('succes' , 'Created Successfully');

    }

    public function edit($id){
        $testmonials = testmonials::where('id' , $id)->first();
        return view('admin.test_monial_edit',compact('testmonials'));
    }

    public function update(Request $request , $id){

        $request->validate([
            'name'=>'required',
            'designation'=>'required',
            'Comment'=>'required'
       ]);

       $whychooseitem = whychooseitem::where('id' , $id)->first();

        $whychooseitem->update([
           'icon'=>$request->icon,
           'heading'=>$request->heading,
           'text'=>$request->text
        ]);

        return redirect()->route('admin_why_choose_item')->with('succes' , 'Update Successfully');

    }

    public function delete($id){
        $whychooseitem = whychooseitem::where('id' , $id)->delete();
        return redirect()->route('admin_why_choose_item')->with('succes' , 'Data is deleted Successfully');
    }


}
