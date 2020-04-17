<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        
        return view('home.index', ['posts' => $posts]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Request $request)
    {   
        $this->validate($request, Post::$rules);
        
        $posts = new Post;
        $posts->title = $request->title;
        $posts->user_name = $request->user()->name;
        $posts->body = $request->body;
        
        $posts->save();
        

    return redirect('posts/create');
    }
    
    public function show(Request $request)
        {
            $post = new Post;
            $post->latest()->get();

            return view('posts.show', [
            'post' => $post,
            ]);
        }

}
