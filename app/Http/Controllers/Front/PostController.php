<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
     public function index(){
        $posts = Post::paginate();
        return view('front.blog' ,compact('posts'));
     }


     public function detail(Request $request , $slug){
        $post_single = Post::where('slug' , $slug)->first();
        dd($post_single);
        return view('front.post' ,compact('post_single'));
     }
}
