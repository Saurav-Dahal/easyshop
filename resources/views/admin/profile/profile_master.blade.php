@extends('admin.dashboard.dashboard_master')

@section('con')

<div class="container-full">
	<section class="content">
        <div class="row">
            <div class="box box-widget widget-user">
							<!-- Add the bg color to the header using any of the bg-* classes -->
				<div class="widget-user-header bg-black">
				    <h6 class="widget-user-desc">Welcome {{$loggedinUser->name}},</h6>
						<a href="{{url('admin/profile/edit/'.$loggedinUser->id)}}" class="btn btn-rounded btn-primary mb-5" style= "float:right;">Edit Profile</a>
				</div>
					<div class="widget-user-image">
					    <img class="rounded-circle" src="{{!empty($loggedinUser->profile_pic)?url('backend/uploads/profile_images/'.$loggedinUser->profile_pic):url('backend/uploads/profile_images/no_image.jpg')}}" alt="User Avatar">
					</div>
					<div class="box-footer">
					    <div class="row">
						    <div class="col-sm-4">
						        <div class="description-block">
							    	<h5 class="description-header">Role</h5>
							        <span class="description-text">EDITOR</span>
						        </div>
								<!-- /.description-block -->
						    </div>
								<!-- /.col -->
						    <div class="col-sm-4 br-1 bl-1">
						        <div class="description-block">
							        <h5 class="description-header">{{$loggedinUser->email}}</h5>
							        <span class="description-text">{{$loggedinUser->name}}</span>
							    </div>
								<!-- /.description-block -->
						    </div>
								<!-- /.col -->
						    <div class="col-sm-4">
							    <div class="description-block">
									<h5 class="description-header">Status</h5>
									<span class="description-text">ACTIVATED</span>
								</div>
								<!-- /.description-block -->
							</div>
								<!-- /.col -->
						</div>
							<!-- /.row -->
				    </div>
			</div>
        </div>
    </section>
</div>
@endsection
