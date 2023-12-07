@extends('admin.dashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-wrapper">
    <div class="page-content"> 
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Add Terms &Condition</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Terms &Condition</li>
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
                            <form action="{{ route('add.terms.store') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">term text</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" name="term_text" class="form-control"   />
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
@endsection