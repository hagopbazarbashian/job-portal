<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\pageblogitems;

class PostController extends Controller
{
     public function index(){
        $posts = Post::paginate();
        $pageblogitem = pageblogitems::first();
        return view('front.blog' ,compact('posts' , 'pageblogitem'));
     }


     public function detail(Request $request , $slug){
        $post_single = Post::where('slug' , $slug)->first();
        $post_single->total_view = $post_single->total_view+1;
        $post_single->update();
        return view('front.post' ,compact('post_single'));
     }
}
