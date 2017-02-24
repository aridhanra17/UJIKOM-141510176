@extends('layouts.appd')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">KATEGORI LEMBUR</div>

                <div class="panel-body">
                @if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Keuangan" )
                    <center><a href="{{route('kategori_lembur.create')}}" class="btn btn-success">Tambah Data</a></center>
                @endif
                    <center>{{$kl->links()}}</center>
	<br>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th>No</th>
				<th>Kode Lembur</th>
				<th>Nama Jabatan</th>
				<th>Nama Golongan</th>
				<th>Besaran Uang</th>
				@if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Keuangan" )
				<th colspan="3"><center>Action</center></th>
				@endif
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($kl as $data)
		<tbody>
			<td>{{$no++}}</td>
			<td>{{$data->kode_lembur}}</td>
			<td>{{$data->Jabatan->nama_jabatan}}</td>
			<td>{{$data->Golongan->nama_golongan}}</td>
			<?php $data->besaran_uang=number_format($data->besaran_uang,2,',','.'); ?>
			<td>Rp.{{$data->besaran_uang}}</td>
			@if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Keuangan" )
			<td><center><a href="{{route('kategori_lembur.edit', $data->id)}}" class="btn btn-warning">Edit</a></center></td>
			<td><center>
				<form method="POST" action="{{route('kategori_lembur.destroy', $data->id)}}">
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