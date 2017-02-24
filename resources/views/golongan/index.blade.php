@extends('layouts.appd')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading">GOLONGAN</div>
                <div class="panel-body">
                @if (Auth::user()->permission == "Super Admin" || Auth::user()->permission  == "Admin")
                    <center><a href="{{route('golongan.create')}}" class="btn btn-success">Tambah Data</a></center>
                    <center>{{$gol->links()}}</center>
                @endif
	<br>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th><center>No</center></th>
				<th><center>Kode Golongan</center></th>
				<th><center>Nama Golongan<center></th>
				<th><center>Besaraan Uang</center></th>
				@if (Auth::user()->permission == "Super Admin" || Auth::user()->permission  == "Admin")
				<th colspan="3"><center>Action</center></th>
				@endif
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($gol as $data)
		<tbody>
			<tr>
				<td><center>{{$no++}}</center></td>
				<td><center>{{$data->kode_golongan}}</center></td>
				<td><center>{{$data->nama_golongan}}</center></td>
				<?php $data->besaran_uang=number_format($data->besaran_uang,2,',','.'); ?>
				<td><center>Rp.{{$data->besaran_uang}}</center></td>
				@if (Auth::user()->permission == "Super Admin" || Auth::user()->permission  == "Admin")
				<td><center><a href="{{route('golongan.edit', $data->id)}}" class="btn btn-warning">Edit</a></center></td>
				<td><center>
					<form method="POST" action="{{route('golongan.destroy', $data->id)}}">
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
