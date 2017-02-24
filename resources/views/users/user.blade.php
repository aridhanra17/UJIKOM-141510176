@extends('layouts.appd')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading">USER</div>
                <div class="panel-body">
	<br>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-info">
				<th><center>No</center></th>
				<th><center>Email</center></th>
				<th><center>Nama<center></th>
				<th><center>Permission</center></th>
				<th><center>Password</center></th>
			</tr>
		</thead>
		@php
		$no = 1;
		@endphp
		@foreach($user as $data)
		<tbody>
			<tr>
				<td><center>{{$no++}}</center></td>
				<td><center>{{$data->email}}</center></td>
				<td><center>{{$data->name}}</center></td>
				<td><center>{{$data->permission}}</center></td>
				<td><center>{{$data->password}}</center></td>
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
