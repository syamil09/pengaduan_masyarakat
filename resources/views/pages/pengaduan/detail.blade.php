@extends('layouts.default')

@section('content')
<div class="card shadow">
	<div class="card-body">

		<div class="form-group">
			<label for=""><b>Judul Pengaduan</b></label>
			<p>{{ $item->judul_pengaduan }}</p>
		</div>
		<div class="form-group">
			<label for=""><b>Deskripsi Pengaduan</b></label>
			<p>{{ $item->isi_laporan }}</p>
		</div>
		<div class="form-group">
			<label for=""><b>Foto</b></label>
			<img src="{{ $item->foto }}" alt="Foto Sebelumnnya" class="col-12">
			
		</div>

		<hr>

		<div class="form-group text-center">
			<h1><b>Tanggapan</b></h1>
		</div>

		<div class="form-group row">
			<label for="" class="col-md-2"><b>Nama Petugas : </b></label>
			<p class="col-md-9">Diki</p>
			<label for="" class="col-md-2"><b>Tanggapan : </b></label>
			<p class="col-md-9">
				Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus eos molestiae iusto ullam consectetur aspernatur totam adipisci et illo harum fugiat omnis aliquam sint cupiditate hic rerum corrupti, provident ipsam.
			</p>
		</div>
		<div class="form-group row">
			
		</div>
	</div>
</div>
@endsection