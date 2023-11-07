@extends('frontend.master')
    <!-- Header  -->
    @include('frontend.body.header')
    <script src="https://cdn.jsdelivr.net/npm/iframe_cashpay@1.1.1/index.js"></script>
    <!--End header-->
@section('content')
@section('title')
   Cash Payment
@endsection
<title>CashPayButton</title>
<style>
    /*style for CashPayButton*/
    .CashPayButtonStyle {
        color: white;
        font-size: medium;
        background-color: #006666;
        padding: 15px;
        border-radius: 30px;
    }
</style>
<script>
    //You must use function onClickCashPayButton and return iframeURL
    var orderId;
    async function onClickCashPayButton() {
        //Send itemList for your server and post CreateOrder.
        //For example.
        var itemList = [
            {
                "itemName": "كتاب",
                "amount": 2000
            },
            {
                "itemName": "ساعة",
                "amount": 5000
            }
        ];
        var requestOptions = {
            method: 'POST',
            body: JSON.stringify(itemList),
            redirect: 'follow'
        };
        var iframeURL = "";
        await fetch('route('cash.order')', requestOptions)
            .then(response => response.json())
            .then(res => {
                if (res) {
                    if (res.iframeURL) {
                       //iframeURL returned from Response CreateOrder
                        //Documentation https://documenter.getpostman.com/view/17550185/2s93XzwN9o
                        iframeURL = res.iframeURL;
                        //orderID returned from Response CreateOrder
                        //Store the orderID in the orderId variable to use on function onConfirmPayment
                        orderId = res.orderID;
                    }
                }
            })
            .catch(error => {
                console.error(error);
            });
        if (iframeURL) {
            //You must return iframeURL to display iframe_cashpay
            return iframeURL;
        }
    };

    //Function callback onConfirmPayment
    function onConfirmPayment(data) {
        //After Confirmatin from CashPayButton.
        if(orderId)
        {
        //Here use CheckOrderStatus on your server to check order status.
        //Documentation https://documenter.getpostman.com/view/17550185/2s93XzwN9o
        }
    };
</script>
<script src="https://cdn.jsdelivr.net/npm/iframe_cashpay@1.1.1/index.js">
</script>
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
                <h3 class="heading-2 mb-10">Cash Payment</h3>
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
    <h4>Make Payment </h4>

</div>
<div class="divider-2 mb-30"></div>
<div class="table-responsive order_table checkout">
<CashPayButton className="CashPayButtonStyle" lang="en"></CashPayButton>
{{--     
    <form action="{{ route('stripe.order') }}" method="post" id="payment-form">
        @csrf
    <div class="form-row">
        <label for="card-element">
        Credit or debit card
        </label>
        {{-- <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
        <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
        <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
        <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
        <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
        <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
        <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
        <input type="hidden" name="address" value="{{ $data['shipping_address'] }}">
        <input type="hidden" name="notes" value="{{ $data['notes'] }}"> --}}
        {{-- <div id="card-element">
        <!-- A Stripe Element will be inserted here. -->
        </div>
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>
    <br>
    <button class="btn btn-primary">Submit Payment</button>
    </form> --}} 
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/iframe_cashpay@1.1.1/index.js">
</script>

            </div>
        </div>
    </div>
</main>
@endsection