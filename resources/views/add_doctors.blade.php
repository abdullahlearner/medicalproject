@extends('layouts.adminpanellayout')

@section('pagetitle', 'Add Doctors')

@section('section')
    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-body p-4">
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

                <h5 class="mb-4">Vertical Form</h5>
                <form method="post" action="{{ route('storedoctor') }}"  enctype="multipart/form-data" class="row g-3">
                    @csrf

                    <div class="col-md-12">
                        <label for="input1" class="form-label">Doctor Name</label>
                        <input name="name" type="text" class="form-control" id="input1" placeholder="First Name">
                        @error('name')
                        <div class="alert alert-border-danger alert-dismissible fade show">
                          <div class="d-flex align-items-center">
                            <div class="font-35 text-danger"><span class="material-icons-outlined fs-2">report_gmailerrorred</span>
                            </div>
                            <div class="ms-3">
                              <h6 class="mb-0 text-danger">{{ $message }}</h6>
                            </div>
                          </div>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="input4" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="input4">
                        @error('email')
                        <div class="alert alert-border-danger alert-dismissible fade show">
                          <div class="d-flex align-items-center">
                            <div class="font-35 text-danger"><span class="material-icons-outlined fs-2">report_gmailerrorred</span>
                            </div>
                            <div class="ms-3">
                              <h6 class="mb-0 text-danger">{{ $message }}</h6>
                            </div>
                          </div>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="input3" class="form-label">Phone</label>
                        <input name="phone" type="text" class="form-control" id="input3" placeholder="Phone">
                        @error('phone')
                    <div class="alert alert-border-danger alert-dismissible fade show">
                      <div class="d-flex align-items-center">
                        <div class="font-35 text-danger"><span class="material-icons-outlined fs-2">report_gmailerrorred</span>
                        </div>
                        <div class="ms-3">
                          <h6 class="mb-0 text-danger">{{ $message }}</h6>
                        </div>
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="input11" class="form-label">specialization</label>
                        <textarea name="specialization" class="form-control" id="input11" placeholder="specialization ..." rows="3"></textarea>
                        @error('specialization')
                        <div class="alert alert-border-danger alert-dismissible fade show">
                          <div class="d-flex align-items-center">
                            <div class="font-35 text-danger"><span class="material-icons-outlined fs-2">report_gmailerrorred</span>
                            </div>
                            <div class="ms-3">
                              <h6 class="mb-0 text-danger">{{ $message }}</h6>
                            </div>
                          </div>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <h6 class="mb-0 text-uppercase">Dr Profile Picture</h6>
                        <hr>
                        <div class="card">
                            <div class="card-body">
                                <input type="file" id="myFile" name="profile_picture">
                                @error('profile_picture')
                          <div class="alert alert-border-danger alert-dismissible fade show">
                            <div class="d-flex align-items-center">
                              <div class="font-35 text-danger"><span class="material-icons-outlined fs-2">report_gmailerrorred</span>
                              </div>
                              <div class="ms-3">
                                <h6 class="mb-0 text-danger">{{ $message }}</h6>
                              </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          @enderror
                                {{-- <input id="fancy-file-upload" type="file" name="files"
                                    accept=".jpg, .png, image/jpeg, image/png" multiple="" class="ff_fileupload_hidden">

                                <div class="ff_fileupload_wrap">
                                    <div class="ff_fileupload_dropzone_wrap"><button class="ff_fileupload_dropzone"
                                            type="button"
                                            aria-label="Browse, drag-and-drop, or paste files to upload"></button>
                                        <div class="ff_fileupload_dropzone_tools"></div>
                                    </div>
                                    <table class="ff_fileupload_uploads"></table>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-grd-primary px-4">Submit</button>
                            <button type="button" class="btn btn-grd-royal px-4">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
