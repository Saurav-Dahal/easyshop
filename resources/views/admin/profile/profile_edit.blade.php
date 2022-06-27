@extends('admin.dashboard.dashboard_master')

@section('con')

<div class="container-full">
  <section class="content">
              <!-- Basic Forms -->
    <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title">Change Profile</h4>
      </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
              <div class="col-12">
                <form method="POST" action="{{url('admin/profile/update/'.$loggedinUser->id)}}" enctype="multipart/form-data" >
                  @csrf
                  <div class="row">
                    <div class="col-12">	
                      <div class="row">	
                      <div class="col-md-6">
                          <div class="form-group">
                            <h5>User Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="name" class="form-control" required="" data-validation-required-message="This field is required" value="{{$loggedinUser->name}}"> <div class="help-block"></div></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>User Email <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="email" name="email" class="form-control" required="" data-validation-required-message="This field is required" value="{{$loggedinUser->email}}"> <div class="help-block"></div></div>
                          </div>
                        </div>			
                      </div>
                      <div class="row">	
                        <div class="col-md-6">
                        <div class="form-group">
                        <h5>Profile Picture <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input type="file" name="profile_pic" class="form-control" > <div class="help-block"></div></div>
                      </div>
                        </div>
                        <div class="col-md-6">
                         <img src="{{!empty($loggedinUser->profile_pic)?url('backend/uploads/profile_images/'.$loggedinUser->profile_pic):url('backend/uploads/profile_images/no_image.jpg')}}" style="width: 80px; height: 80px;">
                        </div>				
                      </div>
                    <div class="text-xs-right">
                      <input type="submit" class="btn btn-rounded btn-primary" value="Update">
                    </div>
                  </form>

              </div>
              <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </section>
</div>
@endsection
