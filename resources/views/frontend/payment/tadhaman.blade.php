@extends('frontend.master')
    <!-- Header  -->
    @include('frontend.body.header')
    <!--End header-->
@section('content')
@section('title')
   Tadhaman Payment
@endsection
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a> 
                <span></span> cash Payment
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h3 class="heading-2 mb-10">Tadhaman Payment</h3>
                <div class="d-flex justify-content-between">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="border p-40 cart-totals ml-30 mb-50">
                <div class="d-flex align-items-end justify-content-between mb-30">
                    <h4>Your Order Details</h4>                
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="table-responsive order_table checkout"> 
                
                <table class="table no-border">
                    <tbody>
                        @if (Session::has('coupon'))
                        <tr>
                            <td class="cart_total_label">
                                <h6 class="text-muted">Subtotal</h6>
                            </td>
                            <td class="cart_total_amount">
                                <h4 class="text-brand text-end">${{ $cartTotal }}</h4>
                            </td>
                        </tr>
                
                        <tr>
                            <td class="cart_total_label">
                                <h6 class="text-muted">Coupn Name</h6>
                            </td>
                            <td class="cart_total_amount">
                                <h6 class="text-brand text-end">{{ session()->get('coupon')['coupon_name'] }} ( {{ session()->get('coupon')['coupon_discount'] }}% )</h6>
                            </td>
                        </tr>
                
                        <tr>
                            <td class="cart_total_label">
                                <h6 class="text-muted">Coupon Discount</h6>
                            </td>
                            <td class="cart_total_amount">
                                <h4 class="text-brand text-end">${{ session()->get('coupon')['discount_amount'] }}</h4>
                            </td>
                        </tr>
                
                        <tr>
                            <td class="cart_total_label">
                                <h6 class="text-muted">Grand Total</h6>
                            </td>
                            <td class="cart_total_amount">
                                <h4 class="text-brand text-end">${{ session()->get('coupon')['total_amount'] }}</h4>
                            </td>
                        </tr>
                        @else               
                       <tr>
                            <td class="cart_total_label">
                                <h6 class="text-muted">Grand Total </h6>
                            </td>
                            <td class="cart_total_amount">
                                <h4 class="text-brand text-end">${{ $cartTotal }}</h4>
                            </td>
                        </tr> 
                        @endif
                    </tbody>
                </table>
            
            </div>
        </div>
    </div> <!-- // end lg md 6 -->

    <div class="col-lg-6">
        <div class="border p-40 cart-totals ml-30 mb-50">
            <div class="d-flex align-items-end justify-content-between mb-30">
                <img src="{{  asset('frontend\assets\imgs\pay\tadhaman.png') }}" alt="" srcset="">
            </div>
            <div class="divider-2 mb-30"></div>
            <div class="table-responsive order_table checkout">
                <form action="{{ route('tadhaman.order') }}" method="post" id="payment-form">
                    @csrf
                    <div class="form-row">
                        <input type="number" name="AccountNo" id="" placeholder="رقم التعريف الخاص بك">
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <br>
                    <div class="text-center">
                        <button class="btn btn-primary">Submit Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
</div>
</main>

@endsection