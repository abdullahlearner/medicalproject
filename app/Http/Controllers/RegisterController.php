<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
        }

    public function register(Request $request){
        // return $request;
        $validator = Validator::make($request->all(),[
            'username'=> 'required|string|max:255',
            'email'=>   'required|email|unique:users|max:255|string',
            'password'=> 'required|unique:users|min:8|confirmed',
            // 'cpassword' => 'required|confirmed|min:8|'
        ]);

        if($validator->fails()){
            return redirect()->route('register')
            ->withErrors($validator)
            ->withInput();
        }else{
            // return $request;
            $user = new User();
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'customer';
            $user->save();
            return redirect()->route('login')->with('success','Registered successfully !');


        }

    }
}
