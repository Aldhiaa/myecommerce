@extends('vendor.dashboard')
@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
				@php
					$id =Auth::user()->id;
					$venderid =App\Models\User::find($id);
					$status =$venderid->status;
					$orders =App\Models\Order_item::where('vendor_id',$id)->get();
				@endphp
				@if ($status === 'active')
					<h4>Vendor account is <span class="text-success">Active</span></h4>
				@else
				<h4>Vendor account is <span class="text-danger">Inactive</span></h4>
				<p class="text-danger">please wait admin will check and approve your account</p>
				@endif
					<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
						<div class="col">
							<div class="card radius-10 bg-gradient-deepblue">
							 <div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white">{{ count($orders) }}</h5>
									<div class="ms-auto">
                                        <i class='bx bx-cart fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Total Orders</p>
									<p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						  </div>
						</div>
					

					</div><!--end row-->
				




					  <div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-0">Orders Summary</h5>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
							<hr>
							<div class="table-responsive">
								<table class="table align-middle mb-0">
									<thead class="table-light">
										<tr>
											<th>Sl</th>
											<th>Order id</th>
											<th>Product</th>
											<th>Quntaty</th>
											{{-- <th>Customer</th> --}}
											<th>Date</th>
											<th>Price</th>
											<th>Status</th>
											{{-- <th>Action</th> --}}
										</tr>
									</thead>
									<tbody>
										@foreach ($orders as $key => $order)
										<tr>
											<td>{{ $key+1 }}</td>
											<td>{{ $order->order()->id }}</td>
											<td>
												<div class="d-flex align-items-center">
													<div class="recent-product-img">
														<img src="{{ $order->product()->product_thambnail  }}" alt="">
													</div>
													<div class="ms-2">
														<h6 class="mb-1 font-14">{{ $order->product()->product_name  }}</h6>
													</div>
												</div>
											</td>
											{{-- <td>Brooklyn Zeo</td> --}}
											<td>{{ $order->qty  }}</td>
											<td>{{ $order->created_at  }}</td>
											<td>{{ $order->price  }}</td>
											<td>
												<div class="badge rounded-pill bg-light-info text-info w-100">{{ $order->order()->status }}</div>
											</td>
											{{-- <td>
												<div class="d-flex order-actions">	<a href="javascript:;" class=""><i class="bx bx-cog"></i></a>
													<a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt"></i></a>
												</div>
											</td> --}}
										</tr>
										@endforeach
									
									</tbody>
								</table>
							</div>
						</div>
					</div>

			</div>
</div>
<!--end page wrapper -->        
@endsection