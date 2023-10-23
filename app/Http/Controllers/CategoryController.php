<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $posts = $category->posts()->get();
        return view('posts.index')->with(['posts' => $posts, 'categories' => $category ->get()]);
    }
}
