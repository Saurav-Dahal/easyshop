@extends('admin.dashboard.dashboard_master')

@section('con')

<div class="container-full">
  <section class="content">
              <!-- Basic Forms -->
    <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title">Change Password</h4>
      </div>
            <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-12">
            <form method="POST" action="{{route('admin.password.update')}}">
              @csrf
               <div class="row">
                  <div class="col-12">	
                      <div class="row">	
                        <div class="col-md-6">
                            @if(Session::has('error'))
                              <div class="alert alert-danger" role="alert">
                              {{Session::get('error')}}
                              </div>
                            @endif  
                          <div class="form-group">
                            <h5>Current Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="password" name="old_password" id="old_password" class="form-control" data-validation-required-message="This field is required">
                                @error('old_password')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">	
                        <div class="col-md-6"> 
                          <div class="form-group">
                            <h5>New Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="password" name="password" id="password" class="form-control" >
                                @error('password')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">	
                        <div class="col-md-6">
                          <div class="form-group">
                            <h5>Confirm Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                @error('password')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="text-xs-right">
                      <input type="submit" class="btn btn-rounded btn-primary" value="Update">
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
            <!-- /.box -->
  </section>
</div>
@endsection
