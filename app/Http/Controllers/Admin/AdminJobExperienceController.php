<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jobexperience;

class AdminJobExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobexperiences = jobexperience::get();
        return view('admin.job_experience',compact('jobexperiences'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job_experience_create');
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

        jobexperience::create([
            'name'=>$request->name
        ]);

        return redirect()->route('job-experience.index')->with('success' , 'Data Save Successfully');


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
        $jobexperience = jobexperience::where('id' , $id)->first();

        return view('admin.job_experience_edit',compact('jobexperience'));
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
         $jobexperience = jobexperience::where('id' , $id)->first();

         $jobexperience->update([
            'name'=>$request->name
         ]);

         return redirect()->route('job-experience.index')->with('succes' , 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobexperience = jobexperience::where('id' , $id)->first();
        $jobexperience->delete();

        return redirect()->back()->with('succes' , 'Data is deleted Successfully');


    }
}
