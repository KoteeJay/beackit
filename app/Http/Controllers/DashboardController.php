<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('dashboard', [
            'posts' => auth()->user()->posts()->latest()->take(3)->get()
        ]);

    }

}
