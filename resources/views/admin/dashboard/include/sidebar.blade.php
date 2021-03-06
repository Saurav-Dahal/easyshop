@php

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>Easy</b> Shop</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{$route == 'admin.dashboard' ? 'active' : ''}}">
          <a href="{{route('admin.dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview {{$prefix == '/brand' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Brand</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{$route == 'all.brands' ? 'active' : ''}}"><a href="{{route('all.brands')}}"><i class="ti-more"></i>All Brands</a></li>
            <li class="{{$route == 'add.brands' ? 'active' : ''}}"><a href="{{route('add.brands')}}"><i class="ti-more"></i>Add Brand</a></li>
          </ul>
        </li> 
		  
        <li class="treeview {{$prefix == '/category' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class = "{{$route == 'all.categories' ? 'active' : ''}}"><a href="{{route('all.categories')}}"><i class="ti-more"></i>All Category</a></li>
            <li class= "{{$route == 'add.categories' ? 'active' : ''}}"><a href="{{route('add.categories')}}"><i class="ti-more"></i>Add Category</a></li>
          </ul>
        </li>

        <li class="treeview {{$prefix == '/subcategory' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Sub Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class = "{{$route == 'all.subcategories' ? 'active' : ''}}"><a href="{{route('all.subcategories')}}"><i class="ti-more"></i>All SubCategory</a></li>
            <li class= "{{$route == 'add.subcategories' ? 'active' : ''}}"><a href="{{route('add.subcategories')}}"><i class="ti-more"></i>Add SubCategory</a></li>
          </ul>
        </li>

        <li class="treeview {{$prefix == '/subsubcategory' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Sub SubCategory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class = "{{$route == 'all.subsubcategories' ? 'active' : ''}}"><a href="{{route('all.subsubcategories')}}"><i class="ti-more"></i>All Sub SubCategory</a></li>
            <li class= "{{$route == 'add.subsubcategories' ? 'active' : ''}}"><a href="{{route('add.subsubcategories')}}"><i class="ti-more"></i>Add Sub SubCategory</a></li>
          </ul>
        </li>

        <li class="treeview {{$prefix == '/product' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class = "{{$route == 'all.products' ? 'active' : ''}}"><a href="{{route('all.products')}}"><i class="ti-more"></i>All Products</a></li>
            <li class= "{{$route == 'add.products' ? 'active' : ''}}"><a href="{{route('add.products')}}"><i class="ti-more"></i>Add Products</a></li>
          </ul>
        </li>

        <li class="treeview {{$prefix == '/slider' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class = "{{$route == 'all.sliders' ? 'active' : ''}}"><a href="{{route('all.sliders')}}"><i class="ti-more"></i>All Sliders</a></li>
            <li class= "{{$route == 'add.sliders' ? 'active' : ''}}"><a href="{{route('add.sliders')}}"><i class="ti-more"></i>Add Sliders</a></li>
          </ul>
        </li>
		
        <li class="treeview">
          <a href="#">
            <i data-feather="file"></i>
            <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="profile.html"><i class="ti-more"></i>Profile</a></li>
            <li><a href="invoice.html"><i class="ti-more"></i>Invoice</a></li>
            <li><a href="gallery.html"><i class="ti-more"></i>Gallery</a></li>
            <li><a href="faq.html"><i class="ti-more"></i>FAQs</a></li>
            <li><a href="timeline.html"><i class="ti-more"></i>Timeline</a></li>
          </ul>
        </li> 		  
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
            <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
            <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
            <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
            <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
            <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
		  </ul>
        </li>  
		  
		<li class="treeview">
          <a href="#">
            <i data-feather="alert-triangle"></i>
			<span>Authentication</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="auth_login.html"><i class="ti-more"></i>Login</a></li>
			<li><a href="auth_register.html"><i class="ti-more"></i>Register</a></li>
			<li><a href="auth_lockscreen.html"><i class="ti-more"></i>Lockscreen</a></li>
			<li><a href="auth_user_pass.html"><i class="ti-more"></i>Password</a></li>
			<li><a href="error_404.html"><i class="ti-more"></i>Error 404</a></li>
			<li><a href="error_maintenance.html"><i class="ti-more"></i>Maintenance</a></li>	
          </ul>
        </li> 		  		    
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
</aside>