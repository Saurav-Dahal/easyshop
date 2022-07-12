@extends('admin.dashboard.dashboard_master')

@section('con')

<div class="container-full">
	<!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Sliders</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{url('slider/update/'.$sliders->id)}}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">	
                                            <div class="row">	
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="hidden" name="old_image" value="{{$sliders->slider_image}}">
                                                        <h5>Slider Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="slider_name" id="slider_name" class="form-control"  data-validation-required-message="This field is required" value="{{$sliders->slider_name}}"> <div class="help-block"></div>
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
							                                <textarea name="slider_description" rows="10" cols="6" class="form-control" placeholder="Enter Description">{{$sliders->slider_description}}</textarea>
                                                            @error('slider_description')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
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
                                                                <option value="1" {{$sliders->status == 1 ? 'selected' : '' }}>Active</option>
                                                            </select>
                                                            @error('status')
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
                                                            <input type="file" name="slider_image" id="slider_image" class="form-control" value="{{$sliders->slider_image}}"> <div class="help-block"></div>
                                                            @error('slider_image')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    </br>
                                                    <div class="form-group">
                                                        <img src="{{asset($sliders->slider_image)}}" style="width: 100px; height: 50px;">
                                                    </div>
                                                </div>				
                                            </div>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-primary" value="Update Slider">
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