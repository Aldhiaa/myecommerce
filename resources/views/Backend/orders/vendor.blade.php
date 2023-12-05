@extends('admin.dashboard')
@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All {{ $vendor->name }}  Orders products</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All {{ $vendor->name }}  Orders products</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">

                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h3> All {{ $vendor->name }}  Orders products</h3>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
						  <div class="row">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
                     			<tr>
                     				<th>Sl</th>
                     				<th>Date </th>
                     				<th>Invoice </th>
                     				<th>order </th>
                     				<th>product </th>
                     				<th>Amount </th>
                     				<th>Payment </th> 
                     			</tr>
                     		</thead>
                     		<tbody>
                     	       @foreach($order_item as $key => $item)		
                     			<tr>
                     				<td> {{ $key+1 }} </td>
                     				<td>{{ $item->order->order_date }}</td>
                     				<td>{{ $item->order->invoice_no }}</td>
                     				<td>{{ $item->order->order_number }}</td>
                     				<td>{{ $item->product->product_name }}</td>
                     				<td>${{ $item->price }}</td>
                     				<td>{{ $item->payment_method }}</td>
                     			</tr>
								 @php
								 $totalAmount += $item->price;
							     @endphp
                     			@endforeach
                     
                     
                     		</tbody>
                     		<tfoot>
                     			<tr>
                     				<th>Sl</th>
                     				<th>Date </th>
                                    <th>Invoice </th>
                     				<th>order </th>
                     				<th>product </th>
                     				<th>Amount </th>
                     				<th>Payment </th>
									
                     			</tr>
                     		</tfoot>
						  </div>
						  <div class="row">
							<div class="col-sm-12 col-md-5">
								<div class="dataTables_info" id="example_info" role="status" aria-live="polite">
									Total:
								</div>
							</div>
							<div class="col-sm-12 col-md-7">
								<div >
									{{ $totalAmount }}
								</div>									
						  </div>
							
                     	</table>
                </div>
            </div>
        </div>



    </div>



</div>
<!--end page wrapper -->        
@endsection