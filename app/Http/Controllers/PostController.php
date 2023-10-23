<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
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
}
