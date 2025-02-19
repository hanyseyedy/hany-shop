<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get(); // دریافت آخرین پست‌ها
        $products = Product::all();
        
        return view('home', compact('posts','products'));
    }
}
