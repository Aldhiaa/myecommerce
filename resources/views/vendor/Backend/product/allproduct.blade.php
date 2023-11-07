@extends('vendor.dashboard')
@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Product</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.product') }}" class="btn btn-primary">add product</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr/>
        <h6>List Product:<span class="badge rounded-pill bg-info">{{ count($allproducts) }}</span></h6>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>image</th>
                                <th>product name</th>
                                <th>price</th>
                                <th>Qty</th>
                                <th>Discount</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allproducts as  $item)
                            <tr>
                                <td>{{ $item->id}}</td>
                                <td><img src="{{ asset($item->product_thambnail) }}" style="width: 70px;height:70px" alt=""></td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->selling_price }}</td>
                                <td>{{ $item->product_qty }}</td>
                                <td>
                                    @if ($item->discount_price == NULL)
                                    <span class="badge rounded-pill bg-info">No discount</span>  
                                    @else
                                    @php
                                       $amount =$item->selling_price -$item->discount_price ;
                                       $discount = ($amount/$item->selling_price) *100;
                                    @endphp
                                    <span class="badge rounded-pill bg-danger">{{ round($discount) }}%</span>  

                                    @endif
                                </td>
                                <td>@if ($item->status == 1)
                                    <span class="badge rounded-pill bg-success">Active</span>
                
                                    @else
                                    <span class="badge rounded-pill bg-danger">Inactive</span>    
                                    
                                    @endif</td>
                                <td>
                                    <a href="{{ route('vendor.edit.product',$item->id ) }}" class="btn btn-info " title="Edit product"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('vendor.delete.product',$item->id ) }}" class="btn btn-danger " title="delete product"><i class="fa fa-trash"></i></a>

                                    <a href="{{ route('vendor.edit.product',$item->id ) }}" class="btn btn-warning " title="Details page"><i class="fa fa-eye"></i></a>
                                    @if ($item->status == 1)
                                    <a href="{{ route('vendor.product.inactive',$item->id) }}" class="btn btn-primary" title="Inactive"><i class="fa fa-thumbs-up"></i></a>         
                
                                    @else
                                    <a href="{{ route('vendor.product.active',$item->id) }}" class="btn btn-primary" title="Active" ><i class="fa fa-thumbs-down"></i></a>         
                                    @endif
                                
                                </td>
                            
                            </tr> 
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SI</th>
                                <th>image</th>
                                <th>product name</th>
                                <th>price</th>
                                <th>Qty</th>
                                <th>Discount</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!--end page wrapper -->        
@endsection