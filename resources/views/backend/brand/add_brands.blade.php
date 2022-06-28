@extends('admin.dashboard.dashboard_master')

@section('con')

<div class="container-full">
	<!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Change Profile</h4>
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
                                                        <input type="text" name="name" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                @error('brand_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>			
                                        </div>
                                        <div class="row">	
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Brand Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="profile_pic" class="form-control" > <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                @error('brand_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                            <!-- <img src="{{!empty($loggedinUser->profile_pic)?url('backend/uploads/profile_images/'.$loggedinUser->profile_pic):url('backend/uploads/profile_images/no_image.jpg')}}" style="width: 80px; height: 80px;"> -->
                                            </div>				
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary" value="Add">
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


<!-- <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Brands</h3>
                    </div>

                    <div class="box-body">



                    
                    <form action="{{route('store.brands')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name </label>
                            <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1"  placeholder="Enter brand name">
                        </div>
                        @error('brand_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Brand Image </label>
                            <input type="file" name="brand_image" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        @error('brand_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div> -->

@endsection