<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/backend/images/logo-letter.png') }}">

    <title>Registrasi - Whistleblowing System | DPMPTSP Provinsi Riau</title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('assets/backend/css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/css/skin_color.css') }}">	

</head>
	
<body class="hold-transition theme-primary bg-img" style="background-image: url({{ asset('assets/backend/images/auth-bg/bg-ok.jpg') }})">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded30 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">Registrasi</h2>
								<p class="mb-0" style="font-size: 20px">Whistleblowing System</p>							
								<p class="mb-0" style="font-size: 28px"><strong>Pemerintah Provinsi Riau</strong></p>	
								<p class="mb-0" style="font-size: 16px" >Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</p>						
							</div>
							<div class="p-40">
                                <form method="POST" action="{{ action('Backend\RegistrasiController@store') }}" class="text-left">
                                    @csrf
									<div class="form-group">
										<label>Nama Depan <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											</div>
											<input type="text" name="nama_depan" value="{{ old('nama_depan') }}" class="form-control pl-15 bg-transparent @error('nama_depan') is-invalid @enderror" placeholder="Masukkan Nama Depan" autofocus>
											@error('nama_depan')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="form-group">
										<label>Nama Belakang <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											</div>
											<input type="text" name="nama_belakang" value="{{ old('nama_belakang') }}" class="form-control pl-15 bg-transparent @error('nama_belakang') is-invalid @enderror" placeholder="Masukkan Nama Belakang" autofocus>
											@error('nama_belakang')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group">
										<label>No Handphone <span class="text-danger">*</span> <small> Gunakan <font color="#ff3333"> 62 </font> untuk mengganti angka dua pertama 08 </small></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											</div>
											<input type="text" name="nope" value="{{ old('nope') }}" class="form-control pl-15 bg-transparent @error('nope') is-invalid @enderror" placeholder="Masukkan Nomor Handphone : 62" autofocus>
                                        
											@error('nope')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group">
										<label>Username <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											</div>
											<input type="text" name="username" value="{{ old('username') }}" class="form-control pl-15 bg-transparent @error('username') is-invalid @enderror" placeholder="Masukkan Username" autofocus>
											@error('username')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group">
										<label>Email <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
											</div>
											<input type="email" name="email" value="{{ old('email') }}" class="form-control pl-15 bg-transparent @error('email') is-invalid @enderror" placeholder="Masukkan Email Anda" autofocus>
											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group">
										<label>Konfrimasi Email <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
											</div>
											<input type="email" name="email_konfirmasi" value="{{ old('email_konfirmasi') }}" class="form-control pl-15 bg-transparent @error('email_konfirmasi') is-invalid @enderror" placeholder="Konfirmasi Email Anda" autofocus>
											@error('email_konfirmasi')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group">
										<label>Password <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											</div>
											<input type="password" name="password" value="{{ old('password') }}" class="form-control pl-15 bg-transparent @error('password') is-invalid @enderror" placeholder="Password" >
											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group">
										<label>Konfirmasi Password <span class="text-danger">*</span></label>

										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
											</div>
											<input type="password" name="password_konfirmasi" value="{{ old('password_konfirmasi') }}" class="form-control pl-15 bg-transparent @error('password_konfirmasi') is-invalid @enderror" placeholder="Konfirmasi Password" autofocus>
											@error('password_konfirmasi')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									  <div class="row">
										<div class="col-12">
										  <div class="checkbox">
											<input type="checkbox" name="checkbox" id="basic_checkbox_1">
											@error('checkbox')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
											<label for="basic_checkbox_1"><label>Saya setuju dengan persyaratan <span class="text-danger">*</span></label>
										</label>
										  </div>
										</div>
										<!-- /.col -->
										
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-danger mt-10">Registrasi</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>	
								<div class="text-center">
									<p class="mt-15 mb-0">Sudah memiliki akun ? <a href="{{ url ('/login') }}" class="text-warning ml-5">Login Sekarang</a></p>
								</div>	
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{ asset('assets/backend/js/vendors.min.js') }}"></script>
	<script src="{{ asset('assets/backend/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/backend/icons/feather-icons/feather.min.js') }}"></script>	
	@toastr_css
	@toastr_js
	@toastr_render
</body>
</html>
