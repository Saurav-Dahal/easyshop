@extends('frontend.master')

@section('front_content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Sign in</h4>
                    <p class="">Hello, Welcome to your account.</p>
                    <div class="social-sign-in outer-top-xs">
                        <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                        <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" >
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                            <input type="password" name="password" class="form-control unicase-form-control text-input" id="password" >
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="radio outer-xs">
                            <label>
                                <input type="radio" name="remember" id="optionsRadios2" value="option2">Remember me!
                            </label>
                            <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                    </form>					
                </div>
                <!-- Sign-in -->

                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 create-new-account">
                    <h4 class="checkout-subtitle">Create a new account</h4>
                    <form class="register-form outer-top-xs" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="name">Name <span>*</span></label>
                            <input type="text" name="name" class="form-control unicase-form-control text-input" id="name" >
                                 @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                            <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" >
                                @error('email')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                            <input type="text" name="phone_no" class="form-control unicase-form-control text-input" id="phone_no" >
                                @error('phone_no')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                            <input type="password" name="password" class="form-control unicase-form-control text-input" id="password" >
                                @error('password')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                            <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input" id="password_confirmation" >
                                @error('password_confirmation')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                    </form>
                    
                    
                </div>	
                <!-- create a new account -->	

            </div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection

