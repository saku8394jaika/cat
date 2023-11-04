<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use Cloudinary;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index(Post $post,Category $category)
    {
        return view('posts.index')->with(['posts' => $post->get(), 'categories' => $category ->get()]);
    }
    
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }
    
    public function store(Request $request, Post $post)
    {
        //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();

        $input = $request['post'];
        $input += ['image' => $image_url];
        $input += ['user_id' => Auth::id()];
        $post->fill($input)->save();
        
        return redirect('/');
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post, 'comments' => $post->comments()->get()]);
    }
    
    public function comment(Post $post, Comment $comment, Request $request)
    {
        $input = $request['comments'];
        $input += ['post_id' => $post->id];
        $input += ['user_id' => Auth::id()];
        $comment->fill($input)->save();
        
        return redirect('/post/'.$post->id);
    }
    
    public function like(Request $request)
    {
        $postId = $request['post'];
        Auth::user()->like()->attach($postId);
        return $request;
    }
    
     public function unlike(Request $request)
    {
        $postId = $request['post'];
        Auth::user()->like()->detach($postId);
        return $request;
    }
}
