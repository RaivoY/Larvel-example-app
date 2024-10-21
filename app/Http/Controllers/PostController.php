<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        $posts = Post::all();
        return view('posts.index', ['allPosts' => $posts]);
        //return "<h1>All posts</h1>";
    }

    public function show($id){

       // \Log::debug($id);
       $post = Post::find($id);
       return view('posts.show', ['post' => $post]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){

        $data = [
            'title' => $request -> title,
            'content' => $request -> content
        ];

        Post::create($data);
        return redirect('/posts');

        // return view('posts.index');



    }
}
