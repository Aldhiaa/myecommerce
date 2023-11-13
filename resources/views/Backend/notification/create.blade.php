@extends('admin.dashboard')
@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content"> 
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Send Notification  </div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Send Notification </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
    
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="container">
                        <div class="main-body">
                            <div class="row">
    
                                <div class="col-lg-10">
                                    <div class="card">
                                        <div class="card-body">
                                
                                        <form id="myForm" method="post" action="{{ route('store.notification') }}" enctype="multipart/form-data" >
                                            @csrf
                                
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Massage Subject</h6>
                                                </div>
                                                <div class="form-group col-sm-9 text-secondary">
                                                    <input type="text" name="massage_subject" class="form-control"   />
                                                    @error('massage_subject')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror                                       
                                                </div>
                                            </div>
                                
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Massage Content</h6>
                                                </div>
                                                <div class="form-group col-sm-9 text-secondary">
                                                    <input type="text" name="massage_content" class="form-control"   />
                                                    @error('massage_content')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror  
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Choose Recipient</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <select name="recipient_type" class="form-select mb-3" aria-label="Default select example">
                                                        <option selected="">Select Recipient</option>
                                                        <option value="users">Users</option>
                                                        <option value="vendors">Vendors</option>
                                                    </select>
                                                    @error('recipient_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror  
                                                </div>
                                            </div>

                                
                                           <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="submit" class="btn btn-primary px-4" value="Send Massage" />
                                                </div>
                                            </div>
                                        </div>
                                
                                        </form>
                                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!--end page wrapper -->  
@endsection