<?php

namespace App\Http\Controllers;

use App\Quack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quacks = Quack::with('user')->get();

        return view('home', ['quacks' => $quacks]);
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
        //dd($request);

        $request->validate([
            'message' => 'required|min:2',
            'photo' => 'image|nullable',
            'tag' => 'nullable',
        ]);


        //$quack = Quack::create($request->input('message'));

        //Quack::create($request->all());

        $user = Auth::user();
        $quack = new Quack();

        $quack->user_id = $user->id;
        $quack->message = $request->input('message');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Quack $quack
     * @return \Illuminate\Http\Response
     */
    public function edit(Quack $quack)
    {
        return view('quacks.edit_quack');
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
            'message' => 'required|min:2',
            'photo' => 'nullable',
            'tag' => 'nullable',
        ]);

        $user = Auth::user();
        $quack->user_id = $user->id;

        $quack->message = $request->input('message');
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
        return redirect()->route('home');
    }
}
