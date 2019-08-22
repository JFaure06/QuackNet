<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Quack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Quack $quack
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Quack $quack)
    {
        $request->validate([
            'new_comment' => 'required',
        ]);
        $user = Auth::user();

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->quack_id = $quack->id;
        $comment->comment = $request->input('new_comment');
        $comment->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Quack $quack ,Comment $comment)
    {
        //$deletedRows = Comment::where('id', $comment->id)->first()->delete();

        if ($comment->user->id == Auth::user()->id) {
            $comment->delete();
        }
        return redirect()->route('home');
    }
}
