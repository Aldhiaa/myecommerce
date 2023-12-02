<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
   
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('forntend/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />
     {{-- tostare --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" 
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body>
    <!-- Modal -->
 
    <!-- Quick view -->
@include('frontend.body.quick_view')

@yield('content')
@include('frontend.body.footer')
    <!-- Preloader Start -->
    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{  asset('frontend/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Vendor JS-->
    <script src="{{  asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/slick.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/wow.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/counterup.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/images-loaded.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/isotope.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{  asset('frontend/assets/js/plugins/jquery.elevatezoom.js')}}"></script>
   
    <script src="{{  asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{  asset('frontend/assets/js/shop.js?v=5.3') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
    
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.scrolling-tabs.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/st-demo.css') }}">

<script src="{{ asset('frontend/assets/css/jquery.scrolling-tabs.js') }}"></script>
<script src="{{ asset('frontend/assets/css/st-demo.js') }}"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>


<script>
    //   $.ajaxSetup({
    //       headers:{
    //         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    //       }
    //   })
      /// Start product view with Modal 
      function productview(id) {
        $.ajax({
          type:'GET',
          url: 'product/view/modal/'+id,
          datatype: 'json',
          success:function(data){
           console.log(data)
            $('#pname').text(data.product.product_name);
            $('#pprice').text(data.product.selling_price);
            $('#pcode').text(data.product.product_code);
            $('#pcategory').text(data.product.category.category_name);
            $('#pbrand').text(data.product.brand.brand_name);
            $('#pimage').attr('src','/'+data.product.product_thambnail );
            $('#pvendor_id').val(data.product.vendor_id);

            

            $('#product_id').val(id);
            $('#qty').val(1);
            // Product Price 
            if (data.product.discount_price == null) {
                $('#sellprice').text('');
                $('#oldprice').text('');
                $('#sellprice').text(data.product.selling_price);
            }else{
                $('#sellprice').text(data.product.discount_price);
                $('#oldprice').text(data.product.selling_price); 
            }

            if (data.product.product_qty > 0) {
                $('#aviable').text('');
                $('#stockout').text('');
                $('#aviable').text('aviable');
            }else{
                $('#aviable').text('');
                $('#stockout').text('');
                $('#stockout').text('stockout');
            } 
            ///End Start Stock Option
            $('select[name="size"]').empty();
             $.each(data.size,function(key,value){
                $('select[name="size"]').append('<option value="'+value+' ">'+value+'  </option')
                if (data.size == "") {
                    $('#sizeArea').hide();
                }else{
                     $('#sizeArea').show();
                }
             }) // end size
              ///Color 
              $('select[name="color"]').empty();
             $.each(data.color,function(key,value){
                $('select[name="color"]').append('<option value="'+value+' ">'+value+'  </option')
                if (data.color == "") {
                    $('#colorArea').hide();
                }else{
                     $('#colorArea').show();
                }
             }) // end color
          }
          

        })
      }
          /// end product view with Modal 
          

   </script>


<script type="text/javascript">

   function addproductToCart(product_id, pvendor_id) {
            var id = product_id;
            var vendor_id = pvendor_id;            
            console.log(id);
            console.log(vendor_id);
           
            $.ajax({
               type: "POST",
               dataType : 'json',
               data:{
                   _token: '{{ csrf_token() }}',
                   vendor_id:vendor_id
               },
               url: "/cart/product/store/"+id,
               success:function(data){
                miniCart();
                   console.log(data);
                   // Start Message 
                   const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success', 
                  showConfirmButton: false,
                  timer: 3000 
            })
            if ($.isEmptyObject(data.error)) {
                    
                    Toast.fire({
                    type: 'success',
                    title: data.success, 
                    })
            }else{
               
           Toast.fire({
                    type: 'error',
                    title: data.error, 
                    })
                }
                 
              // End Message  
            }
            });
    }


    /// End Add To Cart Prodcut  
</script>
<script type="text/javascript">

   function addToCart() {
            var product_name = $('#pname').text();  
            var id = $('#product_id').val();
            console.log(id);
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var vendor_id = $('#pvendor_id').val();
            console.log(vendor_id);
            var quantity = $('#qty').val(); 
            $.ajax({
               type: "POST",
               dataType : 'json',
               data:{
                   _token: '{{ csrf_token() }}',
                   color:color,
                   size:size, 
                   quantity:quantity,
                   product_name:product_name,
                   vendor_id:vendor_id
               },
               url: "/cart/data/store/"+id,
               success:function(data){
                miniCart();
                $('#closeModal').click();
                   console.log(data);
                   // Start Message 
                   const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success', 
                  showConfirmButton: false,
                  timer: 3000 
            })
            if ($.isEmptyObject(data.error)) {
                    
                    Toast.fire({
                    type: 'success',
                    title: data.success, 
                    })
            }else{
               
           Toast.fire({
                    type: 'error',
                    title: data.error, 
                    })
                }
                 
              // End Message  
            }
            });
    }


    /// End Add To Cart Prodcut  
</script>
<script type="text/javascript">
    
    function miniCart(){
       $.ajax({
           type: 'GET',
           url: '/product/mini/cart',
           dataType: 'json',
           success:function(response){
            $('span[id="cartSubTotal"]').text(response.cartTotal);
            $('#cartQty').text(response.cartQty);
            var miniCart = ""
        $.each(response.carts, function(key,value){
           miniCart += ` <ul>
            <li>
                <div class="shopping-cart-img">
                    <a href="shop-product-right.html"><img alt="Nest" src="/${value.options.image} " style="width:50px;height:50px;" /></a>
                </div>
                <div class="shopping-cart-title" style="margin: -73px 74px 14px; width" 146px;>
                    <h4><a href="shop-product-right.html"> ${value.name} </a></h4>
                    <h4><span>${value.qty} × </span>${value.price}</h4>
                </div>
                <div class="shopping-cart-delete" style="margin: -85px 1px 0px;">
                    <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"  ><i class="fi-rs-cross-small"></i></a>
                </div>
            </li> 
        </ul>
        <hr><br>  
               `  
          });
            $('#miniCart').html(miniCart);
        }
    })
 }
  miniCart();
    /// Mini Cart Remove Start 
   function miniCartRemove(rowId){
     $.ajax({
        type: 'GET',
        url: '/minicart/product/remove/'+rowId,
        dataType:'json',
        success:function(data){
        miniCart();
             // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success', 
                  showConfirmButton: false,
                  timer: 3000 
            })
            if ($.isEmptyObject(data.error)) {
                    
                    Toast.fire({
                    type: 'success',
                    title: data.success, 
                    })
            }else{
               
           Toast.fire({
                    type: 'error',
                    title: data.error, 
                    })
                }
              // End Message  
        }
     })
   }
    /// Mini Cart Remove End 

</script>
<!--  // Start Load MY Cart // -->
<script type="text/javascript">
     function cart(){
    $.ajax({
        type: 'GET',
        url: '/get-cart-product',
        dataType: 'json',
        success:function(response){
            // console.log(response)
 
        var rows = ""
        $.each(response.carts, function(key,value){
           rows += `<tr class="pt-30">
            <td class="custome-checkbox pl-30">
                 
            </td>
            <td class="image product-thumbnail pt-40"><img src="/${value.options.image} " alt="#"></td>
            <td class="product-des product-name">
                <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">${value.name} </a></h6>
                
            </td>
            <td class="price" data-title="Price">
                <h4 class="text-body">$${value.price} </h4>
            </td>
              <td class="price" data-title="Price">
              ${value.options.color == null
                ? `<span>.... </span>`
                : `<h6 class="text-body">${value.options.color} </h6>`
              } 
            </td>
               <td class="price" data-title="Price">
              ${value.options.size == null
                ? `<span>.... </span>`
                : `<h6 class="text-body">${value.options.size} </h6>`
              } 
            </td>
            <td class="text-center detail-info" data-title="Stock">
                <div class="detail-extralink mr-15">
                    <div class="detail-qty border radius">
                        <a type="submit" class="qty-down" id="${value.rowId}" onclick="cartDecrement(this.id)"><i class="fi-rs-angle-small-down"></i></a>                     
                           <input type="text" name="quantity" class="qty-val" value="${value.qty}" min="1">
                        <a  type="submit" class="qty-up" id="${value.rowId}" onclick="cartIncrement(this.id)"><i class="fi-rs-angle-small-up"></i></a>                    </div>
                </div>
            </td>
            <td class="price" data-title="Price">
                <h4 class="text-brand">$${value.subtotal} </h4>
            </td>
            <td class="action text-center" data-title="Remove"><a type="submit" class="text-body"  id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fi-rs-trash"></i></a></td>
        </tr>`  
          });
            $('#cartPage').html(rows);
        }
    })
 }
  cart();

  // Cart Remove Start 
  function cartRemove(id){
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/cart-remove/"+id,
                success:function(data){
                    cart();
                    miniCart();
                    couponCalculation();
                     // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  
                  showConfirmButton: false,
                  timer: 3000 
            })
            if ($.isEmptyObject(data.error)) {
                    
                    Toast.fire({
                    type: 'success',
                    icon: 'success', 
                    title: data.success, 
                    })
            }else{
               
           Toast.fire({
                    type: 'error',
                    icon: 'error', 
                    title: data.error, 
                    })
                }
              // End Message  
                }
            })
        }
// Cart Remove End 

// Cart Decrement Start
 function cartDecrement(rowId){
    $.ajax({
        type: 'GET',
        url: "/cart-decrement/"+rowId,
        dataType: 'json',
        success:function(data){
            cart();
            miniCart();
            couponCalculation();
        }
    });
 }
// Cart Decrement End 


// Cart INCREMENT 
 function cartIncrement(rowId){
    $.ajax({
        type: 'GET',
        url: "/cart-increment/"+rowId,
        dataType: 'json',
        success:function(data){
            cart();
            miniCart();
            couponCalculation();
        }
    });
 }
// Cart INCREMENT End 
</script>
 <!--  // End Load MY Cart // -->

<script   type="text/javascript">
     function applyCoupon(){
        var coupon_name = $('#coupon_name').val();
    $.ajax({
        type: 'POST',
        url: '/get-cart-product',
        dataType: 'json',
        data: {
            _token: '{{ csrf_token() }}',
            coupon_name:coupon_name
        },
        
                url: "/coupon-apply",
                success:function(data){
                    couponCalculation();
                    if (data.validity == true) {
                        $('#couponField').hide();
                    }                  
                     // Start Message 
                   const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success', 
                  showConfirmButton: false,
                  timer: 3000 
            })
            if ($.isEmptyObject(data.error)) {
                    
                    Toast.fire({
                    type: 'success',
                    title: data.success, 
                    })
            }else{
               
           Toast.fire({
                    type: 'error',
                    title: data.error, 
                    })
                }
                 
              // End Message  
                }
            })
    
     }

     // Start CouponCalculation Method   
     function couponCalculation(){
        $.ajax({
            type: 'GET',
            url: "/coupon-calculation",
            dataType: 'json',
            success:function(data){
                if (data.total) {
                $('#couponCalField').html(
                    ` <tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Subtotal</h6>
                    </td>
                    <td class="cart_total_amount">|
                        <h4 class="text-brand text-end">$${data.total}</h4>
                    </td>
                </tr>
                 
                <tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Grand Total</h6>
                    </td>
                    <td class="cart_total_amount">
                        <h4 class="text-brand text-end">$${data.total}</h4>
                    </td>
                </tr>
                ` ) 
            }else{
                $('#couponCalField').html(
                    `<tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Subtotal</h6>
                    </td>
                    <td class="cart_total_amount">
                        <h4 class="text-brand text-end">$${data.subtotal}</h4>
                    </td>
                </tr>
                 
                <tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Coupon </h6>
                    </td>
                    <td class="cart_total_amount">
  <h6 class="text-brand text-end">${data.coupon_name} <a type="submit" onclick="couponRemove()"><i class="fi-rs-trash"></i> </a> </h6>
                    </td>
                </tr>
                <tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Discount Amount  </h6>
                    </td>
                    <td class="cart_total_amount">
    <h4 class="text-brand text-end">$${data.discount_amount}</h4>
                    </td>
                </tr>
                <tr>
                    <td class="cart_total_label">
                        <h6 class="text-muted">Grand Total </h6>
                    </td>
                    <td class="cart_total_amount">
          <h4 class="text-brand text-end">$${data.total_amount}</h4>
                    </td>
                </tr> `
                    ) 
            }  
            }
        })
     } 
     couponCalculation();
     // end CouponCalculation Method   
</script>
<script type="text/javascript">
    // Coupon Remove Start 
  function couponRemove(){
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/coupon-remove",
                success:function(data){
                   couponCalculation();
                   $('#couponField').show();
                     // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  
                  showConfirmButton: false,
                  timer: 3000 
            })
            if ($.isEmptyObject(data.error)) {
                    
                    Toast.fire({
                    type: 'success',
                    icon: 'success', 
                    title: data.success, 
                    })
            }else{
               
           Toast.fire({
                    type: 'error',
                    icon: 'error', 
                    title: data.error, 
                    })
                }
              // End Message  
                }
            })
        }
// Coupon Remove End 
</script>

<script>
		@if(Session::has('message'))
		toastr.options =
		{
		  "closeButton" : true,
		  "progressBar" : true
		}
			  toastr.success("{{ session('message') }}");
		@endif
	  
		@if(Session::has('error'))
		toastr.options =
		{
		  "closeButton" : true,
		  "progressBar" : true
		}
			  toastr.error("{{ session('error') }}");
		@endif
	  
		@if(Session::has('info'))
		toastr.options =
		{
		  "closeButton" : true,
		  "progressBar" : true
		}
			  toastr.info("{{ session('info') }}");
		@endif
	  
		@if(Session::has('warning'))
		toastr.options =
		{
		  "closeButton" : true,
		  "progressBar" : true
		}
			  toastr.warning("{{ session('warning') }}");
		@endif
</script>
</body>

</html>