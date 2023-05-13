<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
     public function index(){
        $posts = Post::get();
        return view('front.blog' ,compact('posts'));
     }
}
