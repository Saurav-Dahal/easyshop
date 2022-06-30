@extends('admin.dashboard.dashboard_master')

@section('con')

<div class="container-full">
	<!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Brands</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Brand Name</th>
                                    <th>Brand Image</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->brand_name}}</td>
                                    <td><img src="{{url($item->brand_image)}}" alt="brand_image" style="width: 70px; height: 40px;"></td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <a href="{{url('brand/edit/'.$item->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('brand/delete/'.$item->id)}}" class="btn btn-danger" id="delete">Delete</a>
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