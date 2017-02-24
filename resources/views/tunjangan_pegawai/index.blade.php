@extends('layouts.appd')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading">TUNJANGAN PEGAWAI</div>

                <div class="panel-body">
                @if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Admin" )
                    <center><a href="{{route('tunjangan_pegawai.create')}}" class="btn btn-success">Tambah Data</a></center>
                @endif
                    <center>{{$tp->links()}}</center>
	<br>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th>No</th>
				<th>Kode Tunjangan Id</th>
				<th>Nama Pegawai</th>
				@if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Admin" )
				<th colspan="3"><center>Action</center></th>
				@endif
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($tp as $data)
		<tbody>
			<td>{{$no++}}</td>
			<td>{{$data->Tunjangan->kode_tunjangan}}</td>
			<td>{{$data->Pegawai->User->name}}</td>
			@if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Admin" )
			<td><center><a href="{{route('tunjangan_pegawai.edit', $data->id)}}" class="btn btn-primary">Edit</a></center></td>
			<td><center>
				<form method="POST" action="{{route('tunjangan_pegawai.destroy', $data->id)}}">
					{{csrf_field()}}
					<input type="hidden" name="_method" value="DELETE">
					<input class="btn btn-danger" onclick="return confirm('Yakin Mau Menghapus Data? ');" type="submit" value="Hapus"></form>
				</center></td>
			@endif
		</tbody>
		@endforeach
		</table>
	</div>
</div>
</div>
</div>
</div>

@endsection