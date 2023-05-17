<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
 {
    return view('register.index', [
        'title' => 'Register',
        'active' => 'register'
    ]);
 }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'namalengkap' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => 'required|min:6|max:255'
        ]);

        //Pilih salah satu
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        // $request->session()->flash('success', 'Registration successful! Welcome to Noted.');
        return redirect('/home')->with('success', 'Registration successful! Welcome to Noted.');
 }


}
