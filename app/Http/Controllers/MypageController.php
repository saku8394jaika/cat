<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
     public function index()
    {
        $myposts = Auth::user()->posts()->get();
        $likedposts = Auth::user()->like()->get();
        return view('mypages.index')->with(['myposts' => $myposts, 'likedposts' => $likedposts]);
    }
}
