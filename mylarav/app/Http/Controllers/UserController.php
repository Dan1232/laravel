<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\User;

use Illuminate\Http\Request;

use App\Http\Requests\RequestVal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\University;
use App\Models\Admission;
use Session;

class UserController extends Controller
{
    protected $redirectTo = '/tasks';

    public function loginForm(){
        return view('auth.login');
    }

    public function loginvhod(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ])){
            return redirect()->route('home');
        }
        return redirect()->back()->with('error', "Не верный логин или пароль!");
    }

    public function registerForm(){
        return view('auth.register');
    }

    public function createUser(RequestVal $request){
        $request->validated();

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('login.str');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
