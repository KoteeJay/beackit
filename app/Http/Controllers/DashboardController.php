<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            $user = Auth::user();
            $posts = $user->posts()->latest()->get();
    
            return view('dashboard', compact('posts'));
        } catch (\Exception $e) {
            // Log the error and show a friendly message
            Log::error('Error in DashboardController: ' . $e->getMessage());
            dd('Error: ' . $e->getMessage());
        }
    }
}
