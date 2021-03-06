@extends('layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Pengaduan</b></h1>
</div>

<div class="card shadow mb-4">
		@if (session()->get('level') == 'masyarakat')
		<div class="card-header py-3">
			<a href="{{ route('pengaduan.create') }}" class="btn btn-primary">+ add new</a>
		</div>
		@endif
	    <div class="card-body">
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
	                      <th>Tgl Pengaduan</th>
	                      <th>Judul Pengaduan</th>
	                      <th>Status</th>
	                      <th align="right">Action</th>
	                    </tr>
	                  </thead>
	                  <tfoot>
	                    <tr>
	                      <th>Tgl Pengaduan</th>
	                      <th>Judul Pengaduan</th>
	                      <th>Status</th>
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
								<span class="badge badge-success p-2">
							@else
								<span>
							@endif
								{{ $item->status }}
								</span>
	                      	</td>
	                      <td align="right">
	                      
	                      	@if(session()->get('level') == 'petugas' || session()->get('level') == 'admin')
	                        <a href="{{ route('tanggapan.show',$item->id) }}" class="btn btn-primary btn-sm">Tanggapan</a>
	                        @endif
	                        <a href="{{ route('pengaduan.show',$item->id) }}" class="btn btn-info btn-sm">Detail</a>
	                        @if(session()->get('level') == 'masyarakat')
	                        <a href="{{ route('pengaduan.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>
	                        <form action="{{ route('pengaduan.destroy', $item->id) }}" method="post" class="d-inline">
	                          @csrf
	                          @method('DELETE')
	                          <input type="submit" class="btn btn-danger btn-sm delete" value="Delete"></input>
	                        </form>
	                        @endif
	                      </td>
	                    </tr>
	                    @empty
	                    <tr>
	                    	<td colspan="4" align="center">Belum Ada Pengaduan</td>
	                    </tr>
	                    @endforelse
	                  </tbody>
	                </table>
	        </div>
</div>
@endsection