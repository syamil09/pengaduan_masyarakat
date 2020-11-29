@extends('layouts.default')

@section('content')
<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
		<form action="{{ route('pengaduan.update', $item->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="">Judul Pengaduan</label>
			<input  type="text" 
					name="judul_pengaduan" 
					class="form-control @error('judul_pengaduan')is-invalid @enderror" 
					value="{{ old('judul_pengaduan') ?? $item->judul_pengaduan }}">
			@error('judul_pengaduan')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Deskripsi Pengaduan</label>
			<textarea 	name="isi_laporan" id="" cols="30" rows="10"
						class="form-control">{{ old('isi_laporan') ?? $item->isi_laporan }}</textarea>
			@error('isi_laporan')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group row">
			<div class="col-md-3">
				<img src="{{ $item->foto }}" alt="Foto Sebelumnnya" class="col-12">
			</div>
			<div class="col-md-9">
				<label for="">Foto</label>
				<input  type="file" 
						name="foto" 
						accept="image/*" 
						class="form-control @error('foto')is-invalid @enderror" value="{{old('foto')}}">
				@error('foto')
				<div class="invalid-feedback">{{$message}}</div>
				@enderror
			</div>
			
		</div>

		<div class="form-group">
			<!-- <label for="">Foto</label> -->
			<input  type="hidden" 
					name="oldFoto" 
					accept="image/*" 
					class="form-control @error('foto')is-invalid @enderror" 
					value="{{ $item->foto }}">
			@error('foto')
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