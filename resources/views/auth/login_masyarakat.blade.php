<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="{{ asset('template/lib/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card mt-5">
	                <div class="card-header">Login Masyarakat</div>

	                <div class="card-body">
	                	@if(session('succeed'))
	                	<div class="alert alert-success">{{ session('succeed') }}</div>
	                	@endif

	                	@if(session('failed'))
	                	<div class="alert alert-danger">{{ session('failed') }}</div>
	                	@endif
	                    <form method="POST" action="{{ route('login-proses') }}">
	                        @csrf

	                        <div class="form-group row">
	                            <label for="nik" class="col-md-4 col-form-label text-md-right">NIK / Username</label>

	                            <div class="col-md-6">
	                                <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus>

	                                @error('nik')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>


	                        <div class="form-group row">
	                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

	                            <div class="col-md-6">
	                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

	                                @error('password')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        </div>

	                        <div class="form-group row">
	                        	<div class="col-md-6 offset-md-4">
	                                <button type="submit" class="btn btn-primary col-12">
	                                    Login
	                                </button>

	                            </div>
	                            <div class="col-md-6 offset-md-4 text-center mt-3">
	                            	Belum punya akun? <a href="{{ route('register') }}" class="">register</a>
	                            </div>
	                            
	                        </div>
	                    </form>
	                </div>
	            </div>
	            
	        </div>
	        <div class="col-md-12 text-center mt-md-5 mt-sm-1">
	        	<a href="{{ url('/') }}">Kembali Ke Halaman Utama</a>
	        </div>
	    </div>
	</div>
</body>
</html>


