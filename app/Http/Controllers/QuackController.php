<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Quack;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuackController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'min:2',
            'picture' => 'picture|nullable',
            'tags' => 'nullable',
        ]);

        $user = Auth::user();
        $quack = new Quack();

        $quack->user_id = $user->id;
        $quack->message = $request->input('message');
        $quack->picture = $request->input('picture');
        $quack->tags = $request->input('tags');
        $quack->save();
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     */
    public function show(Quack $quack)
    {

        //$quack = Quack::with('user')->get();
        $comments = Comment::with('user')->where('quack_id', $quack->id)->orderBy('id','desc')->get();
        $quack = Quack::with('user','comment')->where('id',$quack->id)->first();
        return view('quacks.show', compact('quack','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     */
    public function edit(Quack $quack)
    {

        return view('quacks.edit', ['quack' => $quack]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quack $quack)
    {
        $request->validate([
            'message' => 'min:2',
            'photo' => 'nullable',
            'tags' => 'nullable',
        ]);

        $quack->message = $request->input('message');
        $quack->picture = $request->input('picture');
        $quack->tags = $request->input('tags');
        $quack->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Quack $quack)
    {
        $quack->delete();
        return redirect()->route('home')->with('success', 'Quack deleted successfully');
    }
}
