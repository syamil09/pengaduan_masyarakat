@extends('layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"><b>Tanggapan Pengaduan</b></h1><br>
</div>
<p>{{ $pengaduan->judul_pengaduan }}</p>
<div class="card shadow mb-4">
		<div class="card-header py-3">

			<a href="{{ route('tanggapan.create', $pengaduan->id) }}" class="btn btn-primary">+ add new</a>
		</div>
	    <div class="card-body">
	    	<form action="{{ route('pengaduan.set-status', $pengaduan->id) }}" method="post">
	    		@csrf
	    	<div class="form-group">	
				<div class="d-flex">
					<label for="">Status Pengaduan : </label>
					<div class="custom-control custom-radio mr-3 ml-4">
					  <input type="radio" 
					  		 id="customRadio1" 
					  		 name="status" 
					  		 class="custom-control-input" 
					  		 value="proses" 
					  		 @if($pengaduan->status == 'proses') {{ 'checked'}} @endif>
					  <label class="custom-control-label" for="customRadio1">Proses</label>
					</div>
					<div class="custom-control custom-radio">
					  <input type="radio" 
					         id="customRadio2" 
					         name="status" 
					         class="custom-control-input"
					         value="selesai" 
					         @if($pengaduan->status == 'selesai') {{ 'checked'}} @endif>
					  <label class="custom-control-label" for="customRadio2">Selesai</label>
					</div>
					<button type="submit" class="btn btn-outline-info btn-sm ml-3">set status</button>
				</div>	
			</div>
			</form>
	        <div class="table-responsive">
	                @if(session('succeed'))
	                <div class="alert alert-success">{{session('succeed')}}</div>
	                @endif
	                @if(session('failed'))
	                <div class="alert alert-danger">{{session('failed')}}</div>
	                @endif
	                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                  <thead>
	                    <tr>
	                      <th>Tgl Tanggapan</th>
	                      <th>Tanggapan</th>
	                      <th>Nama Petugas</th>
	                      <th align="right">Action</th>
	                    </tr>
	                  </thead>
	                  <tfoot>
	                    <tr>
	                      <th>Tgl Tanggapan</th>
	                      <th>Tanggapan</th>
	                      <th>Nama Petugas</th>
	                      <th align="right">Action</th>
	                    </tr>
	                  </tfoot>
	                  <tbody>
	                  	@forelse ($items as $item)
	                    <tr>
	                      <td>{{ date('d M Y', strtotime($item->tgl_tanggapan)) }}</td>
	                      <td>{{ $item->tanggapan }}</td>
	                      <td>{{ $item->petugas->nama }}</td>
	                      <td align="right">
	                        <a href="{{ route('pengaduan.show',$item->id) }}" class="btn btn-info btn-sm">Detail</a>
	                        <a href="{{ route('pengaduan.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>
	                        <form action="{{ route('tanggapan.destroy', $item->id) }}" method="post" class="d-inline">
	                          @csrf
	                          @method('DELETE')
	                          <input type="submit" class="btn btn-danger btn-sm delete" value="Delete"></input>
	                        </form>
	                      </td>
	                    </tr>
	                    @empty
	                    <tr>
	                    	<td colspan="4" align="center">Belum Ada Tanggapan</td>
	                    </tr>
	                    @endforelse
	                  </tbody>
	                </table>
	        </div>
</div>
@endsection