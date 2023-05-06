<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\whychooseitem;

class AdminWhyChooseController extends Controller
{
    public function index(){
        $whychooseitems = whychooseitem::get();
        return view('admin.why_choose',compact('whychooseitems'));
    }

    public function create(Request $request){

        return view('admin.why_choose_items_create');
    }

    public function store(Request $request){

        $request->validate([
            'icon'=>'required',
            'heading'=>'required',
            'text'=>'required'
       ]);

       whychooseitem::create([
        'icon'=>$request->icon,
        'heading'=>$request->heading,
        'text'=>$request->text
       ]);

       return redirect()->route('admin_why_choose_item')->with('succes' , 'Data Save Successfully');

    }

    public function edit($id){
        $whychooseitem = whychooseitem::where('id' , $id)->first();
        return view('admin.why_choose_items_edit',compact('whychooseitem'));
    }

    public function update(Request $request , $id){
        $request->validate([
            'icon'=>'required',
            'heading'=>'required',
            'text'=>'required'
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
