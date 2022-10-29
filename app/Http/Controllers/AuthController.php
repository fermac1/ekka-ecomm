<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function createRegister(){
        Redirect::setIntendedUrl(url()->previous());
        return view('register');
    }

    public function register(){
        
       $attributes = request()->validate([
            'firstname' => ['required', 'max:50'],
            'lastname' => ['required', 'max:50'],
            'email' => 'required|max:50|unique:users,email',
            'phonenumber' => ['required', 'max:50'],
            'address' => ['max:50'],
            'password' => 'required|confirmed|min:7|max:255'
        ]);
        
    
        $attributes['password'] = bcrypt($attributes['password']);

        User::create($attributes); 
        
        return redirect()->intended('login')
        ->with('success', 'Your account has been created.');
    }

    public function createLogin(){
        Redirect::setIntendedUrl(url()->previous());
        return view('login');
    }

    public function login(){
        //validate the request
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //authenticate and login the user based on the provided descriptions
        if(auth()->attempt($attributes)){
            return redirect('/');
            // return redirect()->intended(RouteServiceProvider::HOME);
        }
      

        //auth failed
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);

    }
}
