<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->load('quacks.user');

        return view('ducks.show', ['user' => $user]);
    }

}
