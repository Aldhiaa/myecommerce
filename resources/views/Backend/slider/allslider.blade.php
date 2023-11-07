@extends('admin.dashboard')
@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All slider</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All slider</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.slider') }}" class="btn btn-primary">add slider</a>
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
                                <th>slider title</th>
                                <th>short title</th>
                                <th>slider image</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allsliders as  $item)
                            <tr>
                                <td>{{ $item->id}}</td>
                                <td>{{ $item->slider_title }}</td>
                                <td>{{ $item->short_title }}</td>
                                <td><img src="{{ asset($item->slider_image) }}" style="width: 70px;height:70px" alt=""></td>
                                <td><a href="{{ route('edit.slider',$item->id ) }}" class="btn btn-info ">Edit</a></td>
                                <td><a href="{{ route('delete.slider',$item->id ) }}" class="btn btn-danger ">Delete</a></td>
                            </tr> 
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SI</th>
                                <th>slider title</th>
                                <th>short title</th>
                                <th>slider image</th>
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