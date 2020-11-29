@extends('layouts.default')

@section('content')
<a href="{{ route('pengaduan.index') }}" class="btn btn-primary btn-sm mb-3">Kembali</a>
<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
		<form action="{{ route('petugas.update', $item->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="">Nama</label>
			<input  type="text" 
					name="nama" 
					class="form-control @error('nama')is-invalid @enderror" 
					value="{{ old('nama') ?? $item->nama ?? '' }}">
			@error('nama')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Username</label>
			<input  type="text" 
					name="username" 
					class="form-control @error('username')is-invalid @enderror" 
					value="{{ old('username') ?? $item->username ?? '' }}">
			@error('username')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Password</label>
			<input  type="password" 
					name="password" 
					class="form-control @error('password')is-invalid @enderror" 
					value="{{ '' }}"
					placeholder="Ubah ini hanya jika anda ingin mengubah password."
					>
			@error('password')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">No Telpon</label>
			<input  type="text" 
					name="telpon" 
					class="form-control @error('telpon')is-invalid @enderror" 
					value="{{ old('telpon') ?? $item->telpon ?? '' 		}}">
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
				<button type="submit" class="btn btn-primary col-12">Simpan</button>
		</div>
		</form>
	</div>
</div>
@endsection