<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Work $work)
    {
        $comments = Comment::where('work_id', '=', $work->id);
        return view('comment_index')
        ->with('comments', $comments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Work $work)
    {
        return view('comment_create')
        ->with('work', $work);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Work $work)
    {
        $request->validate
        ([
            'comment' => 'required|max:1000',
        ]);
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->work_id = $work->id;
        $comment->comment = $request->input(["comment"]);
        $comment->save();
        return redirect()->route('work.index')
        ->with('success', 'コメント投稿完了');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
