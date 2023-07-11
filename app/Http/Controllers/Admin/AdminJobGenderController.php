<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jobgender;

class AdminJobGenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobgenders = jobgender::get();
        return view('admin.job_gender',compact('jobgenders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job_gender_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        jobgender::create([
            'name'=>$request->name
        ]);

        return redirect()->route('job-gender.index')->with('succes' , 'Data Save Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $jobgender = jobgender::where('id' , $id)->first();
       return view('admin.job_gender_edit',compact('jobgender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $jobgender = jobgender::where('id' , $id)->first();

        $jobgender->update([
            'name'=>$request->name
        ]);

        return redirect()->route('job-gender.index')->with('succes' , 'Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobgender = jobgender::where('id' , $id)->first();
        $jobgender ->delete();
        return redirect()->back()->with('succes' , 'Data is deleted Successfully');
    }
}
