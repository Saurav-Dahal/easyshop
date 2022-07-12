@extends('admin.dashboard.dashboard_master')

@section('con')

<div class="container-full">
	<!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Brands</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{route('store.brands')}}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">	
                                            <div class="row">	
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Brand Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="brand_name" id="brand_name" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div>
                                                            @error('brand_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>			
                                            </div>
                                            <div class="row">	
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Brand Image <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="brand_image" id="brand_image" class="form-control" > <div class="help-block"></div>
                                                            @error('brand_image')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>				
                                            </div>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-primary" value="Add Brand">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                    <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>       
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
	<!-- /.content -->
</div>


@endsection