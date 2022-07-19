@extends('admin.dashboard.dashboard_master')

@section('con')

<div class="container-full">
	<!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Products</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Product Image </th>
                                    <th>Product Name</th>
                                    <th>Product Quantity</th>
                                    <th>Selling Price</th>
                                    <th>Discounted Price</th>
                                    <th>Status</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{url($item->product_thumbnail)}}" style="width: 100px; height: 80px;"></td>
                                    <td>{{$item->product_name}}</td>
                                    <td>{{$item->product_qty}}</td>
                                    <td>{{$item->selling_price}}</td>
                                    <td>{{$item->discount_price}}</td>
                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge badge-primary" style="font-size: 14px;">Active</span>
                                        @else
                                        <span class="badge badge-danger" style="font-size: 14px;">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('product/edit/'.$item->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                        <a href="{{url('product/delete/'.$item->id)}}" class="btn btn-danger" id="delete" onClick="return confirm('Are you sure you want to delete it?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->         
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
	<!-- /.content -->
</div>


@endsection