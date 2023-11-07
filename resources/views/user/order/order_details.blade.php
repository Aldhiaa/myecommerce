@extends('frontend.master')
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="change-password-tab" data-bs-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="true"><i class="fi-rs-user mr-10"></i>change password</a>
                                    </li>
                                    <li class="nav-item">

                                        <a class="nav-link" href="{{ route('user.logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                        
                                <div class="col-md-6">
                                    <div class="card">
                                       <div class="card-header"><h4>Shipping Details</h4> </div> 
                                       <hr>
                                       <div class="card-body">
                                         <table class="table" style="background:#F4F6FA;font-weight: 600;">
                                            <tr>
                                                <th>Shipping Name:</th>
                                                <th>{{ $order->name }}</th>
                                            </tr>
                        
                                            <tr>
                                                <th>Shipping Phone:</th>
                                                <th>{{ $order->phone }}</th>
                                            </tr>
                        
                                            <tr>
                                                <th>Shipping Email:</th>
                                                <th>{{ $order->email }}</th>
                                            </tr>
                        
                                             <tr>
                                                <th>Shipping Address:</th>
                                                <th>{{ $order->adress }}</th>
                                            </tr>
                        
                        
                                            <tr>
                                                <th>Division:</th>
                                               <th>{{ $order->division->division_name }}</th>
                                            </tr>
                        
                                            <tr>
                                                <th>District:</th>
                                               <th>{{ $order->district->district_name }}</th>
                                            </tr>
                        
                                            <tr>
                                                <th>State :</th>
                                                 <th>{{ $order->state->state_name }}</th>
                                            </tr>
                        
                                             <tr>
                                                <th>Post Code  :</th>
                                                 <th>{{ $order->post_code }}</th>
                                            </tr>
                        
                                             <tr>
                                                <th>Order Date   :</th>
                                                <th>{{ $order->order_date }}</th>
                                            </tr>
                        
                                        </table>
                        
                                       </div>
                        
                                    </div>
                                </div>
                        <!-- // End col-md-6  --> 
                        
                        
                                <div class="col-md-6">
                                    <div class="card">
                                       <div class="card-header"><h4>Order Details
                                         <span class="text-danger">Invoice : {{ $order->invoice_no }} </span></h4>
                                        </div> 
                                       <hr>
                                       <div class="card-body">
                                        <table class="table" style="background:#F4F6FA;font-weight: 600;">
                                            <tr>
                                                <th> Name :</th>
                                                <th>{{ $order->user->name }}</th>
                                            </tr>
                        
                                            <tr>
                                                <th>Phone :</th>
                                              <th>{{ $order->user->phone }}</th>
                                            </tr>
                        
                                            <tr>
                                                <th>Payment Type:</th>
                                               <th>{{ $order->payment_method }}</th>
                                            </tr>
                        
                        
                                            <tr>
                                                <th>Transx ID:</th>
                                               <th>{{ $order->transaction_id }}</th>
                                            </tr>
                        
                                            <tr>
                                                <th>Invoice:</th>
                                               <th class="text-danger">{{ $order->invoice_no }}</th>
                                            </tr>
                        
                                            <tr>
                                                <th>Order Amonut:</th>
                                                 <th>${{ $order->amount }}</th>
                                            </tr>
                        
                                             <tr>
                                                <th>Order Status:</th>
                                                <th><span class="badge rounded-pill bg-warning">{{ $order->status }}</span></th>
                                            </tr>
                        
                                        </table>
                        
                                       </div>
                        
                                    </div>
                                </div>
                        <!-- // End col-md-6  --> 
                        
                    </div><!-- // End Row  -->
                        
                </div> 
                <div class="container">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="table-responsive">
                           <table class="table" style="font-weight: 600;"  >
                               <tbody>
                                   <tr>
                                       <td class="col-md-1">
                                           <label>Image </label>
                                       </td>
                                       <td class="col-md-2">
                                           <label>Product Name </label>
                                       </td>
                                       <td class="col-md-2">
                                           <label>Vendor Name </label>
                                       </td>
                                       <td class="col-md-2">
                                           <label>Product Code  </label>
                                       </td>
                                       <td class="col-md-1">
                                           <label>Color </label>
                                       </td>
                                       <td class="col-md-1">
                                           <label>Size </label>
                                       </td>
                                       <td class="col-md-1">
                                           <label>Quantity </label>
                                       </td>
                           
                                       <td class="col-md-3">
                                           <label>Price  </label>
                                       </td> 
                           
                                   </tr>
                           
                           
                                   @foreach($orderItem as $item)
                                    <tr>
                                       <td class="col-md-1">
                                           <label><img src="{{ asset($item->product->product_thambnail) }}" style="width:50px; height:50px;" > </label>
                                       </td>
                                       <td class="col-md-2">
                                           <label>{{ $item->product->product_name }}</label>
                                       </td>
                                       @if($item->vendor_id == NULL)
                                        <td class="col-md-2">
                                           <label>Owner </label>
                                       </td>
                                       @else
                                           <td class="col-md-2">
                                           <label>{{ $item->product->vendor->name }} </label>
                                       </td>
                                       @endif
                           
                                       <td class="col-md-2">
                                           <label>{{ $item->product->product_code }} </label>
                                       </td>
                                       @if($item->color == NULL)
                                        <td class="col-md-1">
                                           <label>.... </label>
                                       </td>
                                       @else
                                       <td class="col-md-1">
                                           <label>{{ $item->color }} </label>
                                       </td>
                                       @endif
                           
                                       @if($item->size == NULL)
                                        <td class="col-md-1">
                                           <label>.... </label>
                                       </td>
                                       @else
                                       <td class="col-md-1">
                                           <label>{{ $item->size }} </label>
                                       </td>
                                       @endif
                                       <td class="col-md-1">
                                           <label>{{ $item->qty }} </label>
                                       </td>
                           
                                       <td class="col-md-3">
                                           <label>${{ $item->price }} <br> Total = ${{ $item->price * $item->qty }}   </label>
                                       </td> 
                           
                                   </tr>
                                   @endforeach
                           
                               </tbody>
                           </table>
                    </div>
                    @if($order->status !== 'deliverd')

                    @else 
                    
                     <div class="form-group" style=" font-weight: 600; font-size: initial; color: #000000;">
                                        <label>Order Return Reason</label>
                                        <textarea name="return_reason" class="form-control"></textarea>
                    </div>
                        <button type="submit" class="btn-sm btn-danger">Order Return</button>
                    @endif
                    <!--  // End Return Order Option  -->
                </div>
            </div>
        </div>
    </div>
</main>

@endsection