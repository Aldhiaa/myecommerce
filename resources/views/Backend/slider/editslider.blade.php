@extends('admin.dashboard')
@section('content')
<div class="page-wrapper">
    <div class="page-content"> 
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit slider</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit slider</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-8">
                      <div class="card">
                        <div class="card-body">
                            <form action="{{ route('eidt.slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">slider title</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" value="{{ $slider->slider_title }}" name="slider_title" class="form-control"   />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Short Title</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text"  value="{{ $slider->short_title }}" name="short_title" class="form-control"   />
                                    </div>
                                </div>
                    
                    
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Slider Image  </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" name="slider_image" class="form-control"  id="image"   />
                                    </div>
                                </div>
                    
                    
                    
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"> </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                         <img id="showImage" src="{{ asset($slider->slider_image) }}" alt="Admin" style="width:100px; height: 100px;"  >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <button type="submit" class="btn btn-primary " style="width: 160px;" >Save</button>
                                </div>  
                            </form>       
                        </div>
                      </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function openFileDialog() {
      document.getElementById('photo-input').click();
    }

    function submitForm() {
      document.getElementById('photo-form').submit();
    }
</script>
@endsection