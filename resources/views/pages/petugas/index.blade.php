@extends('layouts.default')

@section('content')
<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a href="{{ route('petugas.create') }}" class="btn btn-primary">+ add new</a>
		</div>
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
	                      <th>Nama</th>
	                      <th>Username</th>
	                      <th>Telpon</th>
	                      <th>Level</th>
	                      <th align="right">Action</th>
	                    </tr>
	                  </thead>
	                  <tfoot>
	                    <tr>
	                      <th>Nama</th>
	                      <th>Username</th>
	                      <th>Telpon</th>
	                      <th>Level</th>
	                      <th>Action</th>
	                    </tr>
	                  </tfoot>
	                  <tbody>
	                  	@forelse ($items as $item)
	                    <tr>
	                      <td>{{ $item->nama }}</td>
	                      <td>{{ $item->username }}</td>
	                      <td>{{ $item->telpon }}</td>
	                      <td>{{ $item->level }}</td>
	                      <td align="right">
	                        <a href="{{ route('petugas.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>
	                        <form action="{{ route('petugas.destroy', $item->id) }}" method="post" class="d-inline">
	                          @csrf
	                          @method('DELETE')
	                          <input type="submit" class="btn btn-danger btn-sm delete" value="Delete"></input>
	                        </form>
	                      </td>
	                    </tr>
	                    @empty
	                    <tr>
	                    	<td colspan="3" align="center">Data empty</td>
	                    </tr>
	                    @endforelse
	                  </tbody>
	                </table>
	        </div>
</div>
@endsection