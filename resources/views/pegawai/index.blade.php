@extends('layouts.appd')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">PEGAWAI</div>

                <div class="panel-body panel-primary">
                @if (Auth::user()->permission == "Super Admin" || Auth::user()->permission == "Admin" )
                    <center><a href="{{route('pegawai.create')}}" class="btn btn-success">Tambah Data</a></center>
                @endif
                    <center>{{$pegawai->links()}}</center>
                
	<br>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th><center>No</center></th>
				<th><center>NIP</center></th>
				<th><center>Nama Pegawai</center></th>
				<th><center>Jabatan Id</center></th>
				<th><center>Golongan Id</center></th>
				<th><center>Foto</center></th>
				@if (Auth::user()->permission == "Super Admin" || Auth::user()->permission == "Admin" )
				<th colspan="3"><center>Action</center></th>
				@endif
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($pegawai as $data)
		<tbody>
			<tr>
				<td><center>{{$no++}}</center></td>
				<td><center>{{$data->nip}}<center></td>
				<td><center>{{$data->User->name}}<center></td>
				<td><center>{{$data->Jabatan->nama_jabatan}}</center>   </td>
				<td><center>{{$data->Golongan->nama_golongan}}</center>   </td>
				@if(empty($data->photo))
				<td><center><img src="{{asset('gambar/user.png')}}" width="30" height="30"></center></td>
				@endif
				@if(!empty($data->photo))
				<td><center><img src="{{ asset('gambar/'.$data->photo.'') }}" width="30" height="30"></center></td>
				@endif
				@if (Auth::user()->permission == "Super Admin" || Auth::user()->permission == "Admin" )
				<td><center><a href="{{route('pegawai.show', $data->id)}}" class="btn btn-primary">Lihat</a></center></td>
				<td><center><a href="{{route('pegawai.edit', $data->id)}}" class="btn btn-warning">Edit</a></center></td>
				<td><center>
					<form method="POST" action="{{route('pegawai.destroy', $data->id)}}">
					{{csrf_field()}}
					<input type="hidden" name="_method" value="DELETE">
					<input class="btn btn-danger" onclick="return confirm('Yakin Mau Menghapus Data? ');" type="submit" value="Hapus"></form>
				</center></td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
