@extends('admin.dashboard')
@section('content')
<div class="page-wrapper">
    <div class="page-content"> 
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Vendor details</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Vendor detailsp</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-10">
                      <div class="card">
                        <div class="card-body">
                            <form action="{{ route('active.vendor.approve') }}" method="POST" >
                                @csrf
                                <input type="hidden" name="id" value="{{ $vendorDetails->id }}">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="name" class="form-control" value="{{ $vendorDetails->name }}"  />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Shop Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="username" class="form-control" value="{{ $vendorDetails->username }}"  />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" name="email" class="form-control" value="{{ $vendorDetails->email }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="phone" type="text" class="form-control" value="{{ $vendorDetails->phone }}" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="address" class="form-control" value="{{ $vendorDetails->address }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor join</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="vendor_join" class="form-control" value="{{ $vendorDetails->vendor_join }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 center" >Card</h6>
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
                                          <img id="showcard" src="{{ $vendorDetails->vendor_card }}" alt="Admin" style="width:100px; height: 100px;"  >
                                     </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 center" >Commercial Record</h6>
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
                                          <img id="showcard" src="{{ $vendorDetails->vendor_record }}" alt="Admin" style="width:100px; height: 100px;"  >
                                     </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Info</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name='vendor_info' id="inputAddress4" rows="3" placeholder="vendor  info" value="{{ $vendorDetails->vendor_info }}"></textarea>                                    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <button type="submit" class="btn btn-danger " style="width: 160px;" >Active Vendor</button>
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