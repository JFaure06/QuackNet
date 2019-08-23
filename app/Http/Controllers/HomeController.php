<?php

namespace App\Http\Controllers;

use App\Quack;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('connected');
        $this->middleware('guest')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function connected()
    {
        $quacks = Quack::with(['comments.user' , 'user'])->latest()->get();

        return view('home.home', ['quacks' => $quacks]);
    }
}
