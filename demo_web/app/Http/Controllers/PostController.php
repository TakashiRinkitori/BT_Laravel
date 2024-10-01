<?php

namespace App\Http\Controllers;
use App\Models\PostModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function list_post(){
        $posts = PostModel::orderBy('post_id', 'desc')->get();
        return view('posts')->with('posts', $posts);

    }
}
