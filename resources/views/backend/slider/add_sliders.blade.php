@extends('admin.dashboard.dashboard_master')

@section('con')

<div class="container-full">
	<!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Sliderss</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{route('store.sliders')}}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">	
                                            <div class="row">	
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Slider Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="slider_name" id="slider_name" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div>
                                                            @error('slider_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>			
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Slider Description <span class="text-danger">*</span></h5>
                                                        <div class="controls">
							                                <textarea name="slider_description" rows="10" cols="6" class="form-control" placeholder="Enter Description"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Status <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="0" selected>Disable</option>
                                                                <option value="1">Active</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">	
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Slider Image <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="slider_image" id="slider_image" class="form-control" > <div class="help-block"></div>
                                                            @error('slider_image')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>				
                                            </div>
                                            
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-primary" value="Add Slider">
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