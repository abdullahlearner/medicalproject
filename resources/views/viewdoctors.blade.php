@extends('layouts.adminpanellayout');
@section('pagetitle','view Doctors')

@section('section')


{{-- This section displays a success alert message if a success session variable is set --}}
@if(session('success'))
<div class="alert alert-success border-0 bg-grd-success alert-dismissible fade show">
  <div class="d-flex align-items-center">
    <div class="font-35 text-white"><span class="material-icons-outlined fs-2">check_circle</span>
    </div>
    <div class="ms-3">
      <h6 class="mb-0 text-white">{{ session('success') }}</h6>
     
    </div>
  </div>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

@foreach ($doctors as $doctor)
    
{{-- @dd($doctor) --}}

<div class="col">
  
    <div class="card rounded-4">
      <div class="row g-0 align-items-center">
        <div class="col-md-4 border-end">
          <div class="p-3 align-self-center">
            <img src="{{ asset('images/'.$doctor->profile_picture) }}" style="width:200px !important" class="w-100 rounded-start" alt="...">
          </div>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{ $doctor->name }}</h5>
            <p class="card-text"> {{ $doctor->specialization }}.</p>
            <h5>{{ $doctor->phone }}</h5>
            <div class="mt-4 d-flex align-items-center justify-content-between">
                <a href="{{ route('editDoctor',$doctor->id) }}">
              <button class="btn btn-grd btn-grd-primary d-flex gap-2 px-3 border-0"><i class="material-icons-outlined">shopping_basket</i>Update Details</button>
            </a>
            <form action="{{ route('deletedoctor',$doctor->id) }}" method="POST">
              @csrf
              @method('delete')
              
              <button class="btn btn-grd btn-grd-primary d-flex gap-2 px-3 border-0"><i class="material-icons-outlined trash">delete_forever</i>Delte</button>
            </form>
              <div class="d-flex gap-1">
                <a href="javascript:;" class="sharelink"><i class="material-icons-outlined">favorite_border</i></a>
                <div class="dropdown position-relative">
                  <a href="javascript:;" class="sharelink dropdown-toggle dropdown-toggle-nocaret" data-bs-auto-close="outside" data-bs-toggle="dropdown"><i class="material-icons-outlined">share</i></a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-share shadow-lg border-0 p-3">
                    <div class="input-group">
                      <input type="text" class="form-control ps-5" value="https://www.codervent.com" placeholder="Enter Url">
                      <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">link</span>
                      <span class="input-group-text gap-1"><i class="material-icons-outlined fs-6">content_copy</i>Copy link</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 mt-3">
                      <button class="py-1 px-3 border-0 rounded bg-pinterest text-white flex-fill d-flex gap-1"><i class="bi bi-pinterest"></i>Pinterest</button>
                      <button class="py-1 px-3 border-0 rounded bg-facebook text-white flex-fill d-flex gap-1"><i class="bi bi-facebook"></i>Facebook</button>
                      <button class="py-1 px-3 border-0 rounded bg-linkedin text-white flex-fill d-flex gap-1"><i class="bi bi-linkedin"></i>Linkedin</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection