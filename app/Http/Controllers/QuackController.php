<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Quack;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
        $this->authorizeResource(Quack::class, 'quack');
    }

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
            'message' => 'required|min:2',
            'picture' => 'nullable',
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
        $quack->load('user', 'comments.user');

        return view('quacks.show', ['quack' => $quack]);
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
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Quack $quack)
    {
        $request->validate([
            'message' => 'required|min:2',
            'picture' => 'nullable',
            'tags' => 'nullable',
        ]);

        $quack->message = $request->input('message');
        $quack->picture = $request->input('picture');
        $quack->tags = $request->input('tags');
        $quack->save();

        return redirect()->route('home');
    }

    /**
     * Search the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function search(Request $request)
    {
        $this->validate($request, [
            'q' => 'required|string'
        ]);

        $q = $request->input('q');

        $quacks = DB::select("
                SELECT * FROM quacks
                JOIN users ON quacks.user_id = users.id
                WHERE message LIKE '%$q%'
              ");

        return view('quacks.search', ['quacks' => $quacks]);
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
        //$this->authorize('delete', $quack);

        if ($quack->user->id == Auth::user()->id) {
            $quack->delete();
        }

        return redirect()->route('home')->with('success', 'Quack deleted successfully');
    }
}
