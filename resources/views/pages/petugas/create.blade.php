@extends('layouts.default')

@section('content')

<div class="d-sm-flex align-items-center justify-content-start mb-4">
	<a href="{{ route('petugas.index') }}" class="btn btn-secondary btn-circle mr-3">
		<i class="fas fa-arrow-left"></i>
	</a>
    <h1 class="h3 mb-0 text-gray-800"><b>Tambah Petugas</b></h1>
</div>

<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
		<form action="{{ route('petugas.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="">Nama</label>
			<input  type="text" 
					name="nama" 
					class="form-control @error('nama')is-invalid @enderror" value="{{old('nama')}}">
			@error('nama')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Username</label>
			<input  type="text" 
					name="username" 
					class="form-control @error('username')is-invalid @enderror" value="{{old('username')}}">
			@error('username')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Password</label>
			<input  type="password" 
					name="password" 
					class="form-control @error('password')is-invalid @enderror" value="{{old('password')}}">
			@error('password')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">No Telpon</label>
			<input  type="text" 
					name="telpon" 
					class="form-control @error('telpon')is-invalid @enderror" value="{{old('telpon')}}">
			@error('telpon')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Level</label>
			<select name="level" id="" class="form-control">
				<option value="petugas">Petugas</option>
				<option value="admin">Admin</option>
				
			</select>
			@error('telpon')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>

				
		<div class="text-center mt-3">
				<button type="submit" class="btn btn-primary col-12">Tambah</button>
		</div>
		</form>
	</div>
</div>
@endsection