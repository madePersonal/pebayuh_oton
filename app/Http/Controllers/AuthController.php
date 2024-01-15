<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function view_login()
    {
        return view('auth.login');
    }

    public function handle_login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = User::where('username', $request->input('username'))->first();
            $request->session()->put('username', $user->username);
            $request->session()->put('id_prev', $user->priv_id);
            $request->session()->put('nama', $user->name);
            return redirect()->intended('dashboard');
        };

        return back()->withErrors([
            'username' => 'Username atau paswword salah',
        ])->onlyInput('username');
    }

    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login.show');
    }
}
