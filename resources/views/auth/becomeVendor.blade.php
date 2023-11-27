@extends('frontend.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .upload-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        border: 1px solid #ccc; /* Add border style */
        padding: 10px;
    }

    #icon_upload {
        font-size: 50px; /* Adjust the font size as needed */
        margin-top: 10px; /* Adjust the margin as needed */
    }
    .tacbox {
      display:block;
      padding: 1em;
      margin: 2em;
      border: 3px solid #ddd;
      background-color: #eee;
      max-width: 800px;
    }
    
    input {
      height: 2em;
      width: 2em;
      vertical-align: middle;
    }
    /*
    label {
      outline: 2px dotted #f00;
    }
    
    /*
    label:after {
      content: attr(for);
    }*/
</style>
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">{{ __('frontend/becomeVendor.create_account') }}</h1>
                                        <p class="mb-30">{{ __('frontend/becomeVendor.already_account') }} <a href="{{ route('login') }}">{{ __('frontend/becomeVendor.login') }}</a></p>
                                    </div>
                                    <form method="post" action="{{ route('vendor.register') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" required="" name="name" placeholder="{{ __('frontend/becomeVendor.shop_name') }}" />
                                            @error('name')
                                            <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required="" name="username" placeholder="{{ __('frontend/becomeVendor.username') }}" />
                                            @error('username')
                                            <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required="" name="email" placeholder="{{ __('frontend/becomeVendor.email') }}" />
                                            @error('email')
                                            <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required="" name="phone" placeholder="{{ __('frontend/becomeVendor.phone') }}" />
                                            @error('phone')
                                            <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required="" name="vendor_trade_type" placeholder="{{ __('frontend/becomeVendor.vendor_trade_type') }}" />
                                            @error('vendor_trade_type')
                                            <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group" >
                                            <input type="file" id="file_upload_id" style="display:none" name="vendor_card" />

                                            <div class="upload-container" >
                                                <label for="file_upload_id">{{ __('frontend/becomeVendor.vendor_card') }}</label>
                                                <a href="#"><i id="icon_upload" class="fa fa-address-card" onclick="_upload()"></i></a>
                                            </div>
                                    
                                            @error('vendor_card')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group" >
                                            <input type="file" id="file_upload_id" style="display:none" name="vendor_record" />

                                            <div class="upload-container" >
                                                <label for="file_upload_id">{{ __('frontend/becomeVendor.vendor_record') }}</label>
                                                <a href="#"><i id="icon_upload" class="fa fa-file-invoice-dollar" onclick="_upload()"></i></a>
                                            </div>
                                    
                                            @error('vendor_record')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="password" name="password" placeholder="{{ __('frontend/becomeVendor.password') }}" />
                                        </div>
                                    
                                        <div class="form-group">
                                            <input required="" type="password" name="password_confirmation" placeholder="{{ __('frontend/becomeVendor.confirm_password') }}" />
                                        </div>                                       
                                        <div class="tacbox">
                                            <input type="checkbox" id="acceptTerms" name="accept_terms">
                                            <label for="acceptTerms" style="margin-left: 8px;"> {{ __('frontend/becomeVendor.agree') }}<a href="{{ route('terms') }}" target="_blank">{{ __('frontend/becomeVendor.term_condition') }}</a></label>
                                        </div>
                                        
                                        
                                        <div class="form-group mb-30">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">{{ __('frontend/becomeVendor.submit_register') }}</button>
                                        </div>
                                        <p class="font-xs text-muted"><strong>{{ __('frontend/becomeVendor.note') }}:</strong>{{ __('frontend/becomeVendor.note_text') }}</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <div class="card-login mt-115">
                                <a href="#" class="social-login facebook-login">
                                    <img src="assets/imgs/theme/icons/logo-facebook.svg" alt="" />
                                    <span>Continue with Facebook</span>
                                </a>
                                <a href="#" class="social-login google-login">
                                    <img src="assets/imgs/theme/icons/logo-google.svg" alt="" />
                                    <span>Continue with Google</span>
                                </a>
                                <a href="#" class="social-login apple-login">
                                    <img src="assets/imgs/theme/icons/logo-apple.svg" alt="" />
                                    <span>Continue with Apple</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main> 
<script>
    function _upload(){
        document.getElementById('file_upload_id').click();
    }
    </script>
@endsection