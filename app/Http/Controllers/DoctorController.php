<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(){
        return view("add_doctors");
    }
    public function store(Request $request){
        $validated = $request->validate(
            [   
                'name' => 'required|string',
                'email' => 'required|email|unique:doctors',
                'phone' => 'required',
                'specialization' => 'required',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            ]
            );
            
            // if ($request->hasFile('profile_picture')) {
            //     $image = $request->file('profile_picture');
            //     $imageName = time() . '.' . $image->getClientOriginalExtension();
                
            //     $img = Image::make($image->getRealPath());
            //     $img->resize(300, 300, function ($constraint) {
            //         $constraint->aspectRatio();
            //         $constraint->upsize();
            //     });
                
            //     $img->save(public_path('images/' . $imageName));
            //     $validated['profile_picture'] = $imageName;
            // }
            


            if($request->hasFile('profile_picture')){
                    $imageName = time().'.'.$request->profile_picture->extension();
                    $request->profile_picture->move(public_path('images'),$imageName);
                    $validated['profile_picture'] = $imageName;
                    // return dd($imageName);
                    // print_r($imageName);
            }

            Doctor::create($validated);
            
        return redirect()->route('add_doctors')->with('success','Doctor added successfully !');
    }
    public function viewdoctors(){
        $doctors = Doctor::all();

        return view('viewdoctors',compact('doctors'));
    }

    public function editDoctor(Doctor $doctor){

        return view('editDoctor', compact('doctor'));
    }

    public function UpdateDoctor(Request $request,Doctor $doctor){
         $validated = $request->validate(
            [   
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required',
                'specialization' => 'required',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048',
            ]
            );
            
            if($request->hasFile('profile_picture')){


                if($doctor->profile_picture && file_exists(public_path('images/'.$doctor->profile_picture))){
             
                    unlink(public_path('images/'.$doctor->profile_picture));
                }

                $imageName = time().'.'.$request->profile_picture->extension();
                $request->profile_picture->move(public_path('images'),$imageName);
                $validated['profile_picture'] = $imageName;

        }

        $doctor->update($validated);
        return redirect()->route('view_doctors')->with('success','Doctor updated successfully !');

    }

    public function deleteDoctor(Doctor $doctor){
        if($doctor->profile_picture && file_exists(public_path('images/'.$doctor->profile_picture))){
             
            unlink(public_path('images/'.$doctor->profile_picture));
        }

        $doctor->delete();
        return redirect()->route('view_doctors')->with('success','Doctor deleted successfully !');

        
    }
}
