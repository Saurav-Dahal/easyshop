@extends('admin.dashboard.dashboard_master')

@section('con')

<div class="container-full">
	<!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Categories</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Category Name</th>
                                    <th>Category Icon</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->category_name}}</td>
                                    <td><img src="{{url($item->category_icon)}}" style="width: 70px; height: 40px;"></td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <a href="{{url('category/edit/'.$item->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                        <a href="{{url('category/delete/'.$item->id)}}" class="btn btn-danger" id="delete" onClick="return confirm('Are you sure you want to delete it?')"><i class="fa fa-trash"></i></a>
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