@extends('vendor.dashboard')
@section('content')
<div class="page-wrapper">
    <div class="page-content"> 
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Profilep</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ (!empty($vendorInfo->photo)) ? url('upload/vendor_images/'.$vendorInfo->photo) : url('upload/no_image.png')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110" onclick="openFileDialog()">
                                    <form id="photo-form" action="{{ route('vendor.update.photo') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" id="photo-input" style="display: none" accept="image/*" name="photo" onchange="submitForm()">
                                    </form>
                                    <div class="mt-3">
                                        <h4>{{ $vendorInfo->name }}</h4>
                                        <h4>{{ $vendorInfo->name }}</h4>
                                        {{-- <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> --}}

                                    </div>
                                </div>
                                <hr class="my-4" />
                                {{-- <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                                        <span class="text-secondary">https://codervent.com</span>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="card">
                        <div class="card-body">
                            <form action="{{ route('vendor.profile.update') }}" method="POST" >
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="name" class="form-control" value="{{ $vendorInfo->name }}"  />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Shop Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="name" class="form-control" value="{{ $vendorInfo->name }}"  />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" name="email" class="form-control" value="{{ $vendorInfo->email }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="phone" type="text" class="form-control" value="{{ $vendorInfo->phone }}" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="address" class="form-control" value="{{ $vendorInfo->address }}" />
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor join</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                            <select name="vendor_join" class="form-select mb-3" aria-label="Default select example">
                                                <option selected="">Open this select menu</option>
                                                <option value="1" {{ $vendorInfo->vendor_join == 2023 ? 'selected' :'' }}>2023</option>
                                                <option value="2" {{ $vendorInfo->vendor_join == 2024 ? 'selected' :'' }}>2024</option>
                                                <option value="3" {{ $vendorInfo->vendor_join == 2025 ? 'selected' :'' }}>2025</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 center" style="padding: 18px">Card</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" style="padding: .375rem 1.75rem .375rem .75rem" >
                                        <input type="file" name="vendor_card" class="form-control"  id="card"   />
                                        @error('vendor_card')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror  
                                    </div>
                                </div>
                    
                                <div class="row mb-3">
                                     <div class="col-sm-3">
                                         <h6 class="mb-0"> </h6>
                                     </div>
                                     <div class="col-sm-9 text-secondary">
                                          <img id="showcard" src="{{ $vendorInfo->vendor_card }}" alt="Admin" style="width:100px; height: 100px;"  >
                                     </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 center" style="padding: 18px">Commercial Record</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" style="padding: .375rem 1.75rem .375rem .75rem" >
                                        <input type="file" name="vendor_record" class="form-control"  id="card"   />
                                        @error('vendor_record')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror  
                                    </div>
                                </div>
                    
                                <div class="row mb-3">
                                     <div class="col-sm-3">
                                         <h6 class="mb-0"> </h6>
                                     </div>
                                     <div class="col-sm-9 text-secondary">
                                          <img id="showcard" src="{{ $vendorInfo->vendor_record }}" alt="Admin" style="width:100px; height: 100px;"  >
                                     </div>
                                </div> --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"  style="padding: 18px">Vendor Info</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name='vendor_info' id="inputAddress4" rows="3" placeholder="vendor  info"></textarea>                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <button type="submit" class="btn btn-primary " style="width: 160px;" >Save Changes</button>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#card').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showcard').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<script>
    function openFileDialog() {
      document.getElementById('photo-input').click();
    }

    function submitForm() {
      document.getElementById('photo-form').submit();
    }
</script>
@endsection