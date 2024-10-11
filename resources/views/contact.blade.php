@extends('layouts.mainlayout')

@section('content')

    <!-- contact info area start -->
    <section class="rr-contact-area pt-100 pb-100">
        <div class="container">
           <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-4 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                 <div class="rr-contat-box-info">
                    <div class="rr-contact-box-item d-flex align-items-center p-relative">
                       <div class="rr-contact-box-icon mr-20">
                          <span><i class="fa-solid fa-phone"></i></span>
                       </div>
                       <div class="rr-contact-box-contat">
                          <span>Call Now</span>
                          <p><a href="tel:+09627387877">+6332500022</a></p>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
                 <div class="rr-contat-box-info">
                    <div class="rr-contact-box-item d-flex align-items-center p-relative">
                       <div class="rr-contact-box-icon mr-20">
                          <span><i class="fa-solid fa-location-dot"></i></span>
                       </div>
                       <div class="rr-contact-box-contat">
                          <span>Address</span>
                          <p><a href="htrrs://www.google.com/maps/@36.0758266,-79.4558848,17z">London Ratab 25</a></p>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
                 <div class="rr-contat-box-info">
                    <div class="rr-contact-box-item d-flex align-items-center p-relative">
                       <div class="rr-contact-box-icon mr-20">
                          <span><i class="fa-sharp fa-solid fa-envelope"></i></span>
                       </div>
                       <div class="rr-contact-box-contat">
                          <span>Email Us</span>
                          <p><a href="mailto:robiul@eobi.com">robiul@eobi.com</a></p>
                       </div>
                    </div>
                 </div>
              </div>

           </div>
        </div>
     </section>
  <!-- contact info area end -->
  <section class="rr-contact-area p-relative black-bg fix">
    <div class="rr-contact-shap">
       <img src="assets/img/contact/shap01.png" alt="img">
    </div>
    <div class="rr-contact-img">
       <img src="assets/img/contact/contact-img.jpg" alt="img">
    </div>
    <div class="container">
       <div class="row">
          <div class="col-xl-6 col-lg-3 col-md-1"></div>
          <div class="col-xl-4 col-lg-9 col-md-10">
             <div class="rr-form-box text-center">
                <b>OUR Booking Now</b>
                <h4 class="rr-section-title pb-60">Appoinment</h4>
                <form action="{{ route('addappointment') }}" method="post">
                   @csrf
                  @if(session('success'))
                     <div class="alert alert-success">
                           {{ session('success') }}
                     </div>
                  @endif
                   <div class="row">
                      <div class="col-xl-6 col-lg-6 col-md-6 mb-20">
                         <div class="rr-form-input-box rr-form-input-main">
                            <input type="text" value="{{ old('name') }}" placeholder="Name" name="name">
                            @error('name')
                               <div class="text-danger">{{ $message }}</div>
                            @enderror
                         </div>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-6 mb-20">
                         <div class="rr-form-input-box rr-form-input-main">
                            <input type="email" value="{{ old('email') }}" placeholder="Email" name="email">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                         </div>
                      </div>

                      <div class="col-xl-12 col-lg-12 col-md-12 mb-20">
                         <div class="rr-form-input-box rr-form-input-main">
                            <input type="text" value="{{ old('address') }}" placeholder="Address" name="address">
                            @error('address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                           </div>
                      </div>
                      <div class=" col-md-12 col-12">
                        <div class="rr-form-input-box pb-30">
                            <select name="services">
                                <option>Choose Doctor</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('services')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="col-12 mb-20">
                         <div class="rr-form-textarea-box">
                            <textarea placeholder="Your meassage"  name="msg">{{ old('msg') }}</textarea>
                            @error('msg')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                         </div>
                      </div>

                   </div>
                   <button  class="rr-btn-1 rr-form-theme-bg" type="submit"><span>Make an appoinment</span></button>
                </form>
               
             </div>
          </div>
          <div class="col-xl-2 col-lg-10 col-md-1"></div>
       </div>
    </div>

 </section>

@endsection