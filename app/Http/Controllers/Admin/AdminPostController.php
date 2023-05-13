<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('admin.post',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.post_create');
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
            'title'=>'required',
            'slug'=>'required',
            'short_discription'=>'required',
            'discription'=>'required'
       ]);


         $Post = Post::create([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'short_discription'=>$request->short_discription,
            'discription'=>$request->discription,
            'total_view'=>'0'

        ]);

        $monials = Post::where('id' , $Post->id)->first();


        $image = $request->file('photo');
        $fileName = $image->hashName();
        $image->move(public_path('uploads'), $fileName);

        $monials->update([
            'photo'=>$fileName
        ]);

        return redirect()->route('admin_post')->with('succes' , 'Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post_edit' , compact('post'));
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
            'title'=>'required',
            'slug'=>'required',
            'short_discription'=>'required',
            'discription'=>'required'
       ]);

       $post = Post::where('id' , $id)->first();

       if($request->hasFile('photo')) {

         if (file_exists(public_path('uploads/'.$post->photo))) {
               unlink(public_path('uploads/'.$post->photo));
            }
            $image = $request->file('photo');
            $fileName = $image->hashName();
            $image->move(public_path('uploads'), $fileName);

            $post->photo = $fileName;

        }
          $post->save();

          $post->update([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'short_discription'=>$request->short_discription,
            'discription'=>$request->discription
        ]);

        return redirect()->route('admin_post')->with('succes' , 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Post::where('id' , $id)->first();
        unlink(public_path('uploads/'.$post->photo));
        Post::where('id' , $id)->delete();
        return redirect()->route('admin_post')->with('succes' , 'Data is deleted Successfully');
    }
}
