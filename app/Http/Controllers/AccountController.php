<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = Auth::user();

        return view('accounts.profile', ['user' => $user]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('accounts.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Account $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required|min:8',
            'newpassword' => 'required|confirmed|min:8'
        ]);

        $user = Auth::user();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');

        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect()->route('ducks.edit')->withErrors(['error password']);
        } elseif (Hash::check($request->input('newpassword'), $user->password)) {
            return redirect()->route('ducks.edit')->withErrors(['error identique password']);
        }


        $user->password = Hash::make($request->input('newpassword'));

        $user->save();

        return redirect()->route('ducks.profile');
    }
}
