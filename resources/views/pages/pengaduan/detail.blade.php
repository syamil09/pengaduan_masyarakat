@extends('layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-start mb-4">
	<a href="{{ route('pengaduan.index') }}" class="btn btn-secondary btn-circle mr-3">
		<i class="fas fa-arrow-left"></i>
	</a>
    <h1 class="h3 mb-0 text-gray-800"><b>Detail Pengaduan</b></h1>
</div>

<div class="card shadow">
	<div class="card-body">

		<div class="form-group">
			<label for=""><b>Judul Pengaduan</b></label>
			<p>{{ $item->judul_pengaduan }}</p>
		</div>
		<div class="form-group">
			<label for=""><b>NIK Pengadu</b></label>
			<p>{{ $item->nik }}</p>
		</div>
		<div class="form-group">
			<label for=""><b>Nama Pengadu</b></label>
			<p>{{ $item->masyarakat->nama }}</p>
		</div>
		<div class="form-group">
			<label for=""><b>Tanggal Pengaduan</b></label>
			<p>{{ $item->tgl_pengaduan }}</p>
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

		@forelse ($item->tanggapan as $tanggapan)
		<div class="form-group row">
			<label for="" class="col-md-2"><b>Nama Petugas : </b></label>
			<p class="col-md-9">{{ $tanggapan->petugas->nama }}</p>
			<label for="" class="col-md-2"><b>Tgl Tanggapan : </b></label>
			<p class="col-md-9">{{ date('d M Y',strtotime($tanggapan->tgl_tanggapan)) }}</p>
			<label for="" class="col-md-2"><b>Tanggapan : </b></label>
			<p class="col-md-9">
				{{ $tanggapan->tanggapan }}
			</p>
		</div>
		<hr>
		@empty
		<div class="form-group row">
			<p class="col-12 text-center">Belum ada tanggapan dari petugas</p>
		</div>
		
		@endforelse
		
	</div>
</div>
@endsection