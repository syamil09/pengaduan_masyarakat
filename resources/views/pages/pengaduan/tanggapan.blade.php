@extends('layouts.default')

@section('content')
<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
		<form action="{{ route('pengaduan.update', $item->id ?? 0) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">	
			<div class="d-flex">
				<label for="">Status Pengaduan : </label>
				<div class="custom-control custom-radio mr-3 ml-4">
				  <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
				  <label class="custom-control-label" for="customRadio1">Proses</label>
				</div>
				<div class="custom-control custom-radio">
				  <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
				  <label class="custom-control-label" for="customRadio2">Selesai</label>
				</div>
			</div>	
		</div>
		<div class="form-group">
			<label for="">Judul Pengaduan</label>
			<input  type="text" 
					name="judul_pengaduan" 
					class="form-control @error('judul_pengaduan')is-invalid @enderror" 
					value="{{ old('judul_pengaduan') ?? $item->judul_pengaduan ?? '' }}">
			@error('judul_pengaduan')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<div class="form-group">
			<label for="">Deskripsi Pengaduan</label>
			<textarea 	name="isi_laporan" id="" cols="30" rows="10"
						class="form-control">{{ old('isi_laporan') ?? $item->isi_laporan ?? '' }}</textarea>
			@error('isi_laporan')
			<div class="invalid-feedback">{{$message}}</div>
			@enderror
		</div>
		<input type="hidden" name="id_pengaduan">
				
		<div class="text-center mt-3">
			<button type="submit" class="btn btn-primary col-12">Simpan</button>
		</div>
		</form>
	</div>
</div>
@endsection