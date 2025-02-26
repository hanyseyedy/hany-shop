<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $user = auth()->user();

        if ($type === 'product') {
            $commentable = Product::findOrFail($id);
        } elseif ($type === 'post') {
            $commentable = Post::findOrFail($id);
        } else {
            return back()->with('error', 'نوع نامعتبر است.');
        }

        $commentable->comments()->create([
            'user_id' => $user->id,
            'content' => $request->content,
        ]);

        return back()->with('success', 'کامنت شما ثبت شد.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
