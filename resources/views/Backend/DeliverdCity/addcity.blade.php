@extends('admin.dashboard')
@section('content')
<div class="page-wrapper">
    <div class="page-content"> 
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Add Delivered city</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add  Delivered city</li>
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
                            <form action="{{ route('store.delivery.city.fee') }}" method="POST" >
                                @csrf
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">City</label>
                                    <?php 
                                    $divisions =App\Models\ShipDivision::all();
                                    ?>
                                    <select name="city" class="form-select" id="city">
                                      <option>select city of the product </option>
                                      @foreach ($divisions as $division)
                                      <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                      @endforeach
                                     </select>
      
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">photo</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="brand_image" type="file" class="form-control"  />
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