<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //

    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>   'required|email',
            'password' => 'required',
            
        ]);
        if($validator->fails()){
            return redirect()->route('login')
            ->withErrors($validator)
            ->withInput();
        }
        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
           return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->with('error','Invalid Credentials');
        }


    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
