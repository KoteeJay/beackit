<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index', [
            'Posts' => Post::latest()->take(10)->get()
        ]);
    }
    public function show(Post $post){
        return view('posts.show', [
            'post' => $post
        ]);    
    }
}
