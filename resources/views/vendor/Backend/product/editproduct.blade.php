@extends('vendor.dashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">eCommerce</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Vendor Product</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->

          <div class="card">
      <div class="card-body p-4">
        <h5 class="card-title">Edit Vendor Product</h5>
        <hr/>
      <div class="form-body mt-4">
                    <form action="{{ route('vendor.eidt.product.store') }}" method="POST" >
                      @csrf
                      <input type="hidden" name="id" value="{{ $products->id }}">
                      <input type="hidden" name="old_image" value="{{ $products->product_thambnail }}">
                      <div class="row">
                        <div class="col-lg-8">
                           <div class="border border-3 p-4 rounded">
                             <div class="mb-3">
                               <label for="inputProductTitle" class="form-label">Product Name</label>
                               <input type="text" name="product_name" value="{{ $products->product_name }}" class="form-control" id="product_name" placeholder="Enter product name">
                             </div>
                             <div class="mb-3">
                               <label for="inputProductTitle" class="form-label">Product Tag</label>
                               <input type="text" name="product_tags" value="{{ $products->product_tags }}" class="form-control visually-hidden" data-role="tagsinput" value="New Product,Top Product,Net">
                             </div>
                             <div class="mb-3">
                               <label for="inputProductTitle" class="form-label">Product Size</label>
                               <input type="text" name="product_size" value="{{ $products->product_size }}" class="form-control visually-hidden" data-role="tagsinput" value="Small,Medium,Large">
                             </div>
                             <div class="mb-3">
                               <label for="inputProductTitle" class="form-label">Product Color</label>
                               <input type="text" name="product_color" value="{{ $products->product_color }}" class="form-control visually-hidden" data-role="tagsinput" value="Black,red,blue">
                             </div>
                             <div class="mb-3">
                             <label for="inputProductDescription" class="form-label">Short Description</label>
                             <textarea name="short_describtion" value="{{ $products->short_describtion }}" class="form-control" id="inputProductDescription" rows="3">{{ $products->short_describtion }}</textarea>
                             </div>
                             <div class="mb-3">
                             <label for="inputProductDescription" class="form-label">Long Description</label>
                             <textarea id="mytextarea" name="long_describtion" value="{{ $products->long_describtion }}" >{{ $products->long_describtion }}</textarea>
                             </div>
                             <div class="mb-3">
                                <label for="inputProductDescription" class="form-label">Main Thambnail</label>
                                <input name="product_thambnail" class="form-control" type="file" id="formFile">                
                            </div>
                             <div class="mb-3">
                                <label for="inputProductDescription" class="form-label">Main Thambnail</label>
                                <img src="{{ asset($products->product_thambnail) }}" alt="" style="width: 100px;height:100px;">
                            </div>

                           </div>
                        </div>
                        <div class="col-lg-4">
                       <div class="border border-3 p-4 rounded">
                                       <div class="row g-3">
                         <div class="col-md-6">
                           <label for="inputPrice" class="form-label">Product Price</label>
                           <input type="text" name="selling_price" value="{{ $products->selling_price }}" class="form-control" id="inputPrice" placeholder="00.00">
                           </div>
                           <div class="col-md-6">
                           <label for="inputDiscountprice" class="form-label">Discount Price</label>
                           <input type="text" name="discount_price" value="{{ $products->discount_price }}" class="form-control" id="inputDiscountprice" placeholder="00.00">
                           </div>

                           <div class="col-md-6">
                           <label for="inputStarPoints" class="form-label">Product Quantity</label>
                           <input type="text" name="product_qty" value="{{ $products->product_qty }}" class="form-control" id="inputStarPoints" placeholder="00.00">
                           </div>
             
                           <div class="col-12">
                           <label for="inputProductType" class="form-label">Product Brand</label>
                           <select name="brand_id" class="form-select" id="inputProductType">
                             <option></option>
                             @foreach ($brands as $brand)
                             <option  value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                             @endforeach
                             </select>
                           </div>
                           <div class="col-12">
                           <label for="inputVendor" class="form-label">Product Categroy</label>
                           <select name="category_id" class="form-select" id="inputVendor">
                             <option></option>
                             @foreach ($categories as $cat)
                             <option value="{{ $cat->id }}" {{ $cat->id == $products->category_id ? 'selected' : '' }}>{{ $cat->category_name }}</option>
                             @endforeach
                             </select>
                           </div>
                           <div class="col-12">
                           <label for="inputCollection" class="form-label">Product SubCategory</label>
                           <select name="subcategory_id" class="form-select" id="inputCollection">
                             <option></option>
                             @foreach ($subcategories as $scat)
                             <option value="{{ $scat->id }}" {{ $scat->id == $products->subcategory_id ? 'selected' : '' }}>{{ $scat->subcategory_name }}</option>
                             @endforeach
                             </select>
                           </div>
                           <div class="col-12">
                             <div class="row ">
                               <div class="col-md-6">
                                 <div class="form-check">
                                   <input name="hot_deals" class="form-check-input" type="checkbox" value="1" {{ $products->hot_deals == 1 ? 'checked' : '' }}  id="flexCheckDefault">
                                   <label  class="form-check-label" for="flexCheckDefault">Hot Deals</label>
                                 </div>
                               </div>
                               <div class="col-md-6">
                                 <div class="form-check">
                                   <input name="featured" {{ $products->featured == 1 ? 'checked' : '' }} class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                   <label class="form-check-label" for="flexCheckDefault">featured</label>
                                 </div>
                               </div>
                               <div class="col-md-6">
                                 <div class="form-check">
                                   <input name="specail_offer" {{ $products->specail_offer == 1 ? 'checked' : '' }} class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                   <label  class="form-check-label" for="flexCheckDefault">Special Offer</label>
                                 </div>
                               </div>
                               <div class="col-md-6">
                                 <div class="form-check">
                                   <input name="specail_deals" {{ $products->specail_deals == 1 ? 'checked' : '' }} class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                   <label class="form-check-label" for="flexCheckDefault">Special Deals</label>
                                 </div>
                               </div>
                             </div>
                           </div>
                           <div class="col-12">
                             <div class="d-grid">
                               <input type="submit" class="btn btn-primary px-4" value="Save Product">
                             </div>
                           </div>
                         </div> 
                       </div>
                       </div>
                      </div><!--end row-->
                    </form>

      </div>
      </div>
    </div>
    <div class="page-content">
      <h6 class="mb-0 text-uppercase">Update Multi Image </h6>
      <hr>
    <div class="card">
    <div class="card-body">
      <table class="table mb-0 table-striped">
        <thead>
          <tr>
            <th scope="col">#Sl</th>
            <th scope="col">Image</th>
            <th scope="col">Change Image </th>
            <th scope="col">Delete </th>
          </tr>
        </thead>
        <tbody>
    
     <form method="post" action="{{ route('vendor.update.product.multiimage') }}" enctype="multipart/form-data" >
          @csrf
    
      @foreach($multiimages as $key => $img)
      <tr>
        <th scope="row">{{ $key+1 }}</th>
        <td> <img src="{{ asset($img->photo_name) }}" style="width:70; height: 40px;"> </td>
        <td> <input type="file" class="form-group" name="multi_img[{{ $img->id }}]"> </td>
        <td> 
      <input type="submit" class="btn btn-primary px-4" value="Update Image " />		
      <a href="{{ route('vendor.product.multiimg.delete',$img->id) }}" class="btn btn-danger" id="delete" > Delete </a>		
        </td>
      </tr>
      @endforeach		 
        </form>	 
        </tbody>
      </table>
    </div>
    </div>
    </div>
  </div>
<!--end page wrapper --> 
<script type="text/javascript">
  $(document).ready(function () {
      $('select[name='category_id']').on('change', function () {
          var categoryId = $(this).val();
          if (categoryId) {
            $.ajax({
              url: "{{ url('/subcategory/ajax') }}/"+category_id,
              method: 'GET',
              dataType:"json",
              success: function (data) {
                $('select[name='subcategory_id']').html('');
  							var d =$('select[name="subcategory_id"]').empty();
                  each(data,function (key,value) {
                      $('select[name='subcategory_id']').append('<option value="' + value.id + '">' + value.subcategory_name + '</option>');
                  });
              },
              else{
                alert('danger');
              }
    
          });
          }

      });
  });
</script>      
@endsection