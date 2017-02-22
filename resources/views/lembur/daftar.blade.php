@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black panel-primary">
               <div class="panel-heading">LEMBUR PEGAWAI</div>

                <div class="panel-body">

                    <center><a href="{{route('lembur_pegawai.create')}}" class="btn btn-success">Tambah Data</a> <a href="" class="btn btn-success">Daftar Data</a></td></center>
                    
                <tr>
	<br>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th>No</th>
				<th>Tanggal</th>
				<th>Nama Pegawai</th>
				<th>Jumlah Jam</th>
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($rekap as $data)
		<tbody>
			<td>{{$no++}}</td>
			<td>{{$data->created_at}}</td>
			<td></td>
			<td>{{$data->jumlah_jam}}</td>
			<td><center><a href="{{route('lembur_pegawai.edit', $data->id)}}" class="btn btn-warning">Edit</a></center></td>
			<td><center>
				<form method="POST" action="{{route('lembur_pegawai.destroy', $data->id)}}">
					{{csrf_field()}}
					<input type="hidden" name="_method" value="DELETE">
					<input class="btn btn-danger" onclick="return confirm('Yakin Mau Menghapus Data? ');" type="submit" value="Hapus"></form>
				</center></td>
		</tbody>
		@endforeach
		</table>

		
	</div>
	</div>
	</div>
</div>
</div>
@endsection