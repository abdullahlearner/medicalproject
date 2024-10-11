<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AppointmentController extends Controller
{
    // function 
    public function contact(){

        return view('contact');
    }

    public function  addappointment(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'services' => 'required|string',
            'msg'=> 'nullable|string',
        ]);
        // Appointment::create([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'address' =>$request->input('address'),
        //     'services' => $request->input('services'),
        //     'msg'=> $request->input('msg'),
        // ]);

        Appointment::create($request->all());
        
        return redirect()->back()->with('success','Appoinment booked successfully !');
        dd($request);
    }

}
