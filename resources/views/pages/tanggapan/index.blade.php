@extends('layouts.default')

@section('content')
<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a href="{{ route('petugas.create') }}" class="btn btn-primary">+ add new</a>
		</div>
	    <div class="card-body">
	    	<form action="" method="post">
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
	                      <td>{{ $item->tgl_pengaduan }}</td>
	                      <td>{{ $item->judul_pengaduan }}</td>
	                      <td>
	                      	@if ($item->status == 'proses')
								<span class="badge badge-secondary p-2">
							@elseif($item->status == 'selesai')
								<span class="badge badge-success">
							@else
								<span>
							@endif
								{{ $item->status }}
								</span>
	                      	</td>
	                      <td align="right">
	                        <a href="{{ route('tanggapan.edit',$item->id) }}" class="btn btn-primary btn-sm">Tanggapan</a>
	                        <a href="{{ route('pengaduan.show',$item->id) }}" class="btn btn-info btn-sm">Detail</a>
	                        <a href="{{ route('pengaduan.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>
	                        <form action="{{ route('pengaduan.destroy', $item->id) }}" method="post" class="d-inline">
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