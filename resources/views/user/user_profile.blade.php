@extends('frontend.master')

@section('front_content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>My Account</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

</br>
</br>
</br>

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="vertical-menu">
                    <a href="{{route('user.profile')}}" class="active">User Profile</a>
                    <a href="#">Change Password</a>
                    <a href="#">Change Address</a>
                    <a href="#">Change Card Details</a>
                    <a href="{{route('logout')}}">Logout</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card w-75" style="background-color: #ffff; padding: 20px 50px">
                    <div class="card-body profile" style="">
                        <h4 class="card-title "><b>User Profile</b4></h4>
                        <div class="gap-20"></div>
                        <h5>Personal Information</h5>
                        <div class="divider"></div>
                        <div class="row">
                            <div class="gap-20"></div>
                            <div class="col-md-4">
                                <div class="card profile-label">
                                    <img src="{{!empty(Auth::user()->profile_pic)?url('frontend/assets/uploads/profile_images/'.Auth::user()->profile_pic):url('frontend/assets/uploads/profile_images/no_image.jpg')}}" class="avatar" alt="Avatar">
                                    <div class="profile-label">
                                        <h4><b>{{Auth::user()->name}}</b></h4>
                                        <p>{{Auth::user()->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                                     @csrf
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1"><h5>Name</h5></label>
                                        <input type="text" name="name" class="form-control unicase-form-control text-input" id="name" value="{{Auth::user()->name}}" >
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1"><h5>Email Address</h5></label>
                                        <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" value="{{Auth::user()->email}}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1"><h5>Phone Number</h5></label>
                                        <input type="text" name="phone_no" class="form-control unicase-form-control text-input" id="phone_no" value="{{Auth::user()->phone_no}}" >
                                            @error('phone_no')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1"><h5>Profile Picture</h5></label>
                                        <input type="file" name="profile_pic" class="form-control unicase-form-control text-input" id="profile_pic" value="{{Auth::user()->profile_pic}}">
                                            @error('profile_pic')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="gap-10"></div>
                                    <button type="submit" class="btn btn-primary checkout-page-button">Save Changes</button>
                               </form>					

                            </div>
                            

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</br>
</br>
</br>

@endsection


