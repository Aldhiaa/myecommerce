@extends('vendor.dashboard')
@section('content')
<div class="page-wrapper">
    <div class="page-content"> 

        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-8">
                      <div class="card">
                        <div class="card-body">
                            <form action="{{ route('vendor.change_password_post') }}" method="POST" >
                                @csrf
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                </div> 
                                    
                                @elseif(session('error'))
                                <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                                </div> 
                                @endif                                                             
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">old password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" name="old_password" class="form-control" @error('old_password') is-invalid @enderror placeholder="enter your old password" />
                                        @error('old_password')
                                            <span class="text-daangor">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">new password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" name="new_password" class="form-control" @error('new_password') is-invalid @enderror  placeholder="enter your new password" />
                                        @error('new_password')
                                            <span class="text-daangor">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">confirm password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" name="new_password_confirmation" class="form-control" @error('confirm_password') is-invalid @enderror placeholder="enter your confirm password" />
                                        @error('confirm_password')
                                            <span class="text-daangor">{{ $message }} </span>
                                        @enderror
                                    </div>
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

@endsection