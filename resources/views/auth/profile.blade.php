@extends('layouts.default')

@section('content')

<div class="d-sm-flex align-items-center justify-content-start mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Profile Saya</b></h1>
</div>

<div class="card shadow col-md-8 offset-md-2">
	<div class="card-body">
		@if(session('succeed'))
			<div class="alert alert-success">{{ session('succeed') }}</div>
		@endif
		@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
		@endif
		<form action="{{ route('profile.update', session()->get('user_id')) }}" method="post" enctype="multipart/form-data">
		@csrf

		@if (session()->get('level') == 'masyarakat')
		<div class="form-group">
			<label for="">NIK</label>
			<input  type="text" 
					name="nama" 
					class="form-control @error('nama')is-invalid @enderror" 
					value="{{ $item->nik ?? '' }}"
					disabled="">
			@error('nama')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		@endif

		<div class="form-group">
			<label for="">Nama</label>
			<input  type="text" 
					name="nama" 
					class="form-control @error('nama')is-invalid @enderror" 
					value="{{ $item->nama ?? '' }}">
			@error('nama')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Username</label>
			<input  type="text" 
					name="username" 
					class="form-control @error('username')is-invalid @enderror" 
					value="{{ $item->username ?? '' }}">
			@error('username')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Password</label>
			<input  type="password" 
					name="password" 
					class="form-control @error('password')is-invalid @enderror" 
					placeholder="Ubah ini jika ingin mengubah password.">
			@error('password')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">No Telpon</label>
			<input  type="text" 
					name="telpon" 
					class="form-control @error('telpon')is-invalid @enderror" 
					value="{{ $item->telpon }}">
			@error('telpon')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
				
		<div class="text-center mt-3">
				<button type="submit" class="btn btn-primary col-12">Simpan</button>
		</div>
		</form>
	</div>
</div>
@endsection