<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments', compact('comments'));
    }

    public function approve(Comment $comment)
    {
        $comment->update(['approved' => true]);
        return redirect()->route('comments.index')->with('success', 'Comment approved successfully!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully!');
    }
}
