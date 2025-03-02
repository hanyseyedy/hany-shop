<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $comments = Comment::with('user')->paginate(10);
        return view('admin.comments.index', compact('comments'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
        return view('admin.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
        $request->validate([
            'content' => 'required|string|max:1000',
            'approved' => 'required|boolean',
        ]);

        $comment->update([
            'content' => $request->content,
            'approved' => $request->approved,
        ]);

        return redirect()->route('admin.comments.index')->with('success', 'کامنت با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success', 'کامنت حذف شد.');
    }

    public function approve(Comment $comment)
    {
        $comment->update(['approved' => true]);
        return back()->with('success', 'کامنت تأیید شد.');
    }
}
