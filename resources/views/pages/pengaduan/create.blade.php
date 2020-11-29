@extends('layouts.default')

@section('content')
<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
		<form action="{{ route('pengaduan.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="">Judul Pengaduan</label>
			<input  type="text" 
					name="judul_pengaduan" 
					class="form-control @error('judul_pengaduan')is-invalid @enderror" value="{{old('judul_pengaduan')}}">
			@error('judul_pengaduan')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Deskripsi Pengaduan</label>
			<textarea 	name="isi_laporan" id="" cols="30" rows="10"
						class="form-control">{{ old('isi_laporan') }}</textarea>
			@error('isi_laporan')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Foto</label>
			<input  type="file" 
					name="foto" 
					accept="image/*" 
					class="form-control @error('foto')is-invalid @enderror" value="{{old('foto')}}">
			@error('foto')
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