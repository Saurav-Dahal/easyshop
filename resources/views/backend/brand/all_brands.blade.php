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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>
                                        <a href="#" class="btn btn-info">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            
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