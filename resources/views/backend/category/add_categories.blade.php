@extends('admin.dashboard.dashboard_master')

@section('con')

<div class="container-full">
	<!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Categories</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{route('store.categories')}}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">	
                                            <div class="row">	
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Category Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="category_name" id="category_name" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div>
                                                            @error('category_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>			
                                            </div>
                                            <div class="row">	
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Category Image <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="category_icon" id="category_icon" class="form-control" > <div class="help-block"></div>
                                                            @error('category_icon')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>				
                                            </div>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-primary" value="Add Category">
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