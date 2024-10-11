<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Doctors\main\MainDoctorController;




Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/about',function(){
    return view('about');
})->name('about');

Route::get('/doctors',[MainDoctorController::class, 'mainDoctorView' ])->name('doctors');

Route::get('/service',function(){
    return view('service');
})->name('service');

// Route::get('/contact',function(){
//      $c = $a + $b;
//     return view('contact');

// })->name('contact');

Route::get('/appointment',[AppointmentController::class,'contact'])->name('contact');
Route::post('/addappointment',[AppointmentController::class,'addappointment'])->name('addappointment');

Route::fallback(function(){
    return response()->view('error404',[],404);
});



Route::group(['prefix' => 'account'], function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    });

    Route::group(['middleware' => 'auth:web'], function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/add_doctors', [DoctorController::class, 'index'])->name('add_doctors');
        Route::get('/view_doctors', [DoctorController::class, 'viewdoctors'])->name('view_doctors');
        Route::get('/edit_doctor/{doctor}', [DoctorController::class, 'editDoctor'])->name('editDoctor');

        Route::put('/update_doctor/{doctor}', [DoctorController::class, 'UpdateDoctor'])->name('updateDoctor');
        
        Route::post('/storedoctor', [DoctorController::class, 'store'])->name('storedoctor');
        Route::delete('/delete_doctor/{doctor}',[DoctorController::class, 'deleteDoctor'])->name('deletedoctor');

        Route::get('/appointment', [AppointmentController::class, 'SelectAppointment'])->name('SelectAppointment');


        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });
    
});



Route::get('/register',[RegisterController::class, 'index'])->name('register');

Route::post('/userregister',[RegisterController::class, 'register'])->name('userregister');