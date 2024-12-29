<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function create()
    {
        return view('dashboard.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $slug = Str::slug($request->body); // Generate slug from body
        $shortSlug = Str::limit($slug, 50, ''); // Shorten the slug

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
        
        Post::create([
            'body' => $request->body,
            'image' => $imagePath,
            'user_id' => Auth::id(),
            'slug' => $shortSlug,
            'published_at' => now(),
        ]);

        return redirect()->back()->with('status', 'Post created successfully');
    
    }
    public function like(Post $post)
    {
        $post->likes()->create(['user_id' => auth()->id()]);
        return back();
    }

    public function unlike(Post $post)
    {
        $post->likes()->where('user_id', auth()->id())->delete();
        return back();
    }

}
