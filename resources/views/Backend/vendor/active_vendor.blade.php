@extends('admin.dashboard')
@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Vendor</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Vendor</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    {{-- <a href="" class="btn btn-primary">add Vendor</a> --}}
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Shop name</th>
                                <th>Vendor username</th>
                                <th>vendor email</th>
                                <th>join date</th>
                                <th>Orders</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activevendor as  $item)
                            <tr>
                                <td>{{ $item->id}}</td>
                                <td>{{ $item->name }}</td>                                
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->vendor_join }}</td>
                                <td><a href="{{ route('vendor.orders.detail',$item->id) }} "class="btn btn-primary" >{{ $item->orderitem->count() }}</a></td>
                                <td><span class="btn btn-secondary" >{{ $item->status }}</span> </td>
                                <td><a href="{{ route('active.vendor.details',$item->id) }}" class="btn btn-secondary">Vendor Details</a></td>
                            </tr> 
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SI</th>
                                <th>Shop name</th>
                                <th>Vendor username</th>
                                <th>vendor email</th>
                                <th>join date</th>
                                <th>Orders</th>
                                <th>Status</th>
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