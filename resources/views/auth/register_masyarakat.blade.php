<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" href="{{ asset('template/lib/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card mt-5">
	                <div class="card-header">Register Masyarakat</div>

	                <div class="card-body">
	                    <form method="POST" action="{{ route('register-proses') }}">
	                        @csrf

	                        <div class="form-group row">
	                            <label for="nik" class="col-md-4 col-form-label text-md-right">NIK</label>

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
	                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

	                            <div class="col-md-6">
	                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

	                                @error('username')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="No Telpon" class="col-md-4 col-form-label text-md-right">Password</label>

	                            <div class="col-md-6">
	                                <input id="No Telpon" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

	                                @error('password')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	    					<div class="form-group row">
	                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama</label>

	                            <div class="col-md-6">
	                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

	                                @error('nama')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="No Telpon" class="col-md-4 col-form-label text-md-right">No Telpon</label>

	                            <div class="col-md-6">
	                                <input id="No Telpon" type="text" class="form-control @error('telpon') is-invalid @enderror" name="telpon" value="{{ old('telpon') }}" required autocomplete="telpon" autofocus>

	                                @error('telpon')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        

	                        <div class="form-group row">
	                        	<div class="col-md-6 offset-md-4">
	                                <button type="submit" class="btn btn-primary col-12">
	                                    Register
	                                </button>

	                            </div>
	                            <div class="col-md-6 offset-md-4 text-center mt-3">
	                            	Sudah punya akun? <a href="{{ route('register') }}" class="">Login</a>
	                            </div>
	                            
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</body>
</html>


