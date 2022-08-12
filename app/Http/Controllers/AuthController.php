<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowLogin()
    {
        return view('client.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('client.home');
        } else {
            return redirect()->route('auth.showLogin');
        }
    }
    public function ShowRegister()
    {
        return view('client.register');
    }
    public function register(Request $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->role = 1;
        $user->password = bcrypt($request->password);
        $user->avt = "http://assets.stickpng.com/images/585e4bf3cb11b227491c339a.png";
        // dd($user);
        $user->save();
        return redirect()->route('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
