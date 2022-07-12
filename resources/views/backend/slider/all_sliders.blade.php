@extends('admin.dashboard.dashboard_master')

@section('con')

<div class="container-full">
	<!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Sliders</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Slider Name</th>
                                    <th>Slider Description</th>
                                    <th>Slider Image</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->slider_name}}</td>
                                    <td>{{$item->slider_description}}</td>
                                    <td><img src="{{url($item->slider_image)}}" alt="slider_image" style="width: 70px; height: 40px;"></td>
                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge badge-primary" style="font-size: 14px;">Active</span>
                                        @else
                                        <span class="badge badge-danger" style="font-size: 14px;">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <a href="{{url('slider/edit/'.$item->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                        <a href="{{url('slider/delete/'.$item->id)}}" class="btn btn-danger" id="delete" onClick="return confirm('Are you sure you want to delete it?')"><i class="fa fa-trash"></i></a>
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