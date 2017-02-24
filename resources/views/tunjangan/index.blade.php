@extends('layouts.appd')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading">TUNJANGAN</div>

                <div class="panel-body">
                @if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Admin" )
                    <center><a href="{{route('tunjangan.create')}}" class="btn btn-success">Tambah Data</a></center>
                @endif
                    <center>{{$tun->links()}}</center>
	<br>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th>No</th>
				<th>Kode Tunjangan</th>
				<th>Nama Jabatan</th>
				<th>Nama Golongan</th>
				<th>Status</th>
				<th>Jumlah Anak</th>
				<th>Besaran Uang</th>
				@if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Admin" )
				<th colspan="3"><center>Action</center></th>
				@endif
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($tun as $data)
		<tbody>
			<td>{{$no++}}</td>
			<td>{{$data->kode_tunjangan}}</td>
			<td>{{$data->Jabatan->nama_jabatan}}</td>
			<td>{{$data->Golongan->nama_golongan}}</td>
			<td>{{$data->status}}</td>
			<td>{{$data->jumlah_anak}}</td>
			<?php $data->besaran_uang=number_format($data->besaran_uang,2,',','.'); ?>
			<td>Rp.{{$data->besaran_uang}}</td>
			@if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Admin" )
			<td><center><a href="{{route('tunjangan.edit', $data->id)}}" class="btn btn-warning">Edit</a></center></td>
			<td><center>
				<form method="POST" action="{{route('tunjangan.destroy', $data->id)}}">
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