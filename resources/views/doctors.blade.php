@extends('layouts.mainlayout')

@section('content')

   
    <div class="container">
        <div class="row">
           <div class="col-xl-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.3s; animation-name: rrfadeUp;">
              <div class="rr-doctors-title-box text-center mb-45">
                 <div class="rr-doctors-title-box z-index-2">
                    <span class="rr-section-subtitle p-relative"><img src="assets/img/testimonial/section-icon.png" alt="img"> Our Best Doctors <img src="assets/img/testimonial/section-icon.png" alt="img"></span>
                    <h4 class="rr-section-title">Experts in Range Medical Services</h4>
                 </div>
              </div> 
           </div>
        </div>
        <div class="row mb-50">
            @foreach ($doctors as $doctor)
           <div class="col-xl-6 col-lg-6 col-md-6 col-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.3s; animation-name: rrfadeUp;">
              <div class="rr-doctors-item mb-25 d-flex align-items-center justify-content-center">
                 <div class="rr-doctors-img">
                    <img src="{{ asset('images/'.$doctor->profile_picture) }}" alt="">
                 </div>
                 <div class="rr-doctors-content">
                    <h4 class="rr-doctors-name"><a href="doctor-details.html">{{ $doctor->name }}</a></h4>
                    <span>{{ $doctor->specialization }} </span>
                    <a class="rr-doctors-button" href="{{ route('contact') }}">Book an Appointment </a>
                 </div>
              </div>
           </div>
           @endforeach
        </div>
     </div>
@endsection