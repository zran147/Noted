<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // public function index() {
    //     return view('login.index', [
    //         'title' => 'Login' ,
    //         'active' => 'login'
    //     ]);
    // }
    public function showLoginForm() {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
            ]);
        }    

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'

        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout()
{
    // dd('Logout method called');
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
}

}
