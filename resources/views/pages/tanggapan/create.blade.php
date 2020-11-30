@extends('layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-start mb-4">
	<a href="{{ url()->previous() }}" class="btn btn-secondary btn-circle mr-3">
		<i class="fas fa-arrow-left"></i>
	</a>
	<h1 class="h3 mb-0 text-gray-800">
		<b>Tambah Tanggapan</b>
		<span class="text-muted h5">&nbsp{{ $item->judul_pengaduan }}</span>
	</h1>
</div>
<p></p>
<div class="card shadow">
	<div class="card-body">
			@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
		<form action="{{ route('tanggapan.store') }}" method="post">
		@csrf
		<input type="hidden" name="id_pengaduan" value="{{ $item->id }}">
		<div class="form-group">
			<label for="">Tanggapan</label>
			<textarea 	name="tanggapan" id="" cols="30" rows="10"
						class="form-control">{{ old('tanggapan') ?? $item->tanggapan ?? '' }}</textarea>
			@error('tanggapan')
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