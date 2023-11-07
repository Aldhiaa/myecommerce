@extends('admin.dashboard')
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
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
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
                                        <input type="text" name="name" class="form-control" value="{{ $vendorDetails->name }}"  />
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
                                            <select name="vendor_join" class="form-select mb-3" aria-label="Default select example">
                                                <option selected="">Open this select menu</option>
                                                <option value="1" {{ $vendorDetails->vendor_join == 2023 ? 'selected' :'' }}>2023</option>
                                                <option value="2" {{ $vendorDetails->vendor_join == 2024 ? 'selected' :'' }}>2024</option>
                                                <option value="3" {{ $vendorDetails->vendor_join == 2025 ? 'selected' :'' }}>2025</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Info</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name='vendor_info' id="inputAddress4" rows="3" placeholder="vendor  info"></textarea>                                    </div>
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