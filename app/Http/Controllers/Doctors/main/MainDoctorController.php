<?php

namespace App\Http\Controllers\Doctors\main;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class MainDoctorController extends Controller
{
    public function mainDoctorView(){
        $doctors = Doctor::all();
        return view('doctors',compact('doctors'));
    }
}
