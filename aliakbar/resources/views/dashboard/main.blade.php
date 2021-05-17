<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/backend/images/logo-letter.png') }}">

	<title>WBS - Whistleblowing System | DPMPTSP Provinsi Riau</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('assets/backend/css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/css/skin_color.css') }}">
	@stack('css')
	
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary">
	
<div class="wrapper">
	<div id="loader"></div>
	
  @include('dashboard.include.header')
  
  @include('dashboard.include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		@yield('content')
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    {{-- <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Purchase Now</a>
		  </li>
		</ul>
    </div> --}}
	  &copy; 2021 <a href="#">TIM IT | Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu </a>. All Rights Reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>

	
	
	<!-- Vendor JS -->
	<script src="{{ asset('assets/backend/js/vendors.min.js')}}"></script>
    <script src="{{ asset('assets/backend/icons/feather-icons/feather.min.js')}}"></script>	

	<script src="{{ asset('assets/backend/vendor_components/moment/min/moment.min.js')}}"></script>
	<script src="{{ asset('assets/backend/vendor_components/dropzone/dropzone.js')}}"></script>
	<!-- EduAdmin App -->
	<script src="{{ asset('assets/backend/js/template.js')}}"></script>
	{{-- <script src="{{ asset('assets/backend/js/pages/dashboard.js')}}"></script> --}}
	@toastr_css
	@toastr_js
	@toastr_render
	<script>
	$("#button-simpan").on('click',function()
	{
		
		$("#icon-simpan").addClass('d-none');
		$("#loading-simpan").removeClass('d-none');
	})
	</script>
	@stack('js')
</body>
</html>
