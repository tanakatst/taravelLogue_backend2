<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * 認証の試行を処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json(Auth::user());
        }

        return response()-> json([], 401);
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerate();

        return response()->json(true);
    }

    // 新規登録機能
    public function register(Request $request){
        {
            $user = User::create([
                "name" => $request->username,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]);
            Auth::login($user);
            return response() -> json($user, 200);
        }
    }

    // ユーザー情報編集
    public function edit(Request $request, User $user){
        {
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            return $user->update()
                ?response()->json($user)
                :response()->json([],500);
        }
    }
}
