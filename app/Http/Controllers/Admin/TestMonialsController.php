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
            'designation'=>'required',
            'comment'=>'required'
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
            'comment'=>'required'
       ]);

       $testmonials = testmonials::where('id' , $id)->first();

       if($request->hasFile('photo')) {

            $image = $request->file('photo');
            $fileName = $image->hashName();
            $image->move(public_path('uploads'), $fileName);

            $testmonials->photo = $fileName;

            if (file_exists(public_path('uploads/'.$testmonials->photo))) {
               unlink(public_path('uploads/'.$testmonials->photo));
            }

        }
         $testmonials->save();

        $testmonials->update([
           'name'=>$request->name,
           'designation'=>$request->designation,
           'comment'=>$request->comment
        ]);

        return redirect()->route('admin_test_monials')->with('succes' , 'Update Successfully');

    }

    public function delete($id){
        $testmonials = testmonials::where('id' , $id)->first();
        unlink(public_path('uploads/'.$testmonials->photo));
        testmonials::where('id' , $id)->delete();
        return redirect()->route('admin_test_monials')->with('succes' , 'Data is deleted Successfully');
    }


}
