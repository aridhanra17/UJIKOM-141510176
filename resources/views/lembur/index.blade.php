@extends('layouts.appd')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black panel-primary">
               <div class="panel-heading">LEMBUR PEGAWAI</div>

                <div class="panel-body">
                @if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Keuangan" )
                    <center>
                    <a href="{{route('lembur_pegawai.create')}}" class="btn btn-success">Tambah Data</a>
                @endif
                    <a href="{{url('daftar_lembur')}}" class="btn btn-success">Jumlah Lembur</a>
                    </center>
                    <center>{{$lp->links()}}</center>
	<br>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th>No</th>
				<th>Tanggal</th>
				<th>Kode Lembur</th>
				<th>Nama Pegawai</th>
				<th>Jumlah Jam</th>
				@if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Keuangan" )
				<th colspan="2"><center>Action</center></th>
				@endif
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		<tbody>
		@foreach($lp as $data)
			<td>{{$no++}}</td>
			<td>{{$data->created_at}}</td>
			<td>{{$data->Kategori_lembur->kode_lembur}}</td>
			<td>{{$data->Pegawai->User->name}}</td>
			<td>{{$data->jumlah_jam}} Jam</td>
			@if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Keuangan" )
			<td><center><a href="{{route('lembur_pegawai.edit', $data->id)}}" class="btn btn-warning">Edit</a></center></td>
			<td><center>
				<form method="POST" action="{{route('lembur_pegawai.destroy', $data->id)}}">
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