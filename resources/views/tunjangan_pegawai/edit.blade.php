@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading">EDIT TUNJANGAN PEGAWAI</div>

                <div class="panel-body">
                {!! Form::model($tp,['method'=>'PATCH', 'route'=>['tunjangan_pegawai.update', $tp->id]]) !!}
   
				<div class="form-group{{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
						{!! Form::label ('Nama Pegawai', ' Nama Pegawai:') !!}
						<select class="form-control" name="pegawai_id">
						<option value="{{$peg->id}}" selected>{{$peg->nip}} || {!! $peg->User->name!!} || {!! $peg->Jabatan->nama_jabatan!!} || {!! $peg->Golongan->nama_golongan!!}</option>
							@foreach($nopeg as $data)
							<option value="{!! $data->id!!}">{!! $data->nip!!} || {!! $data->User->name!!} || {!! $data->Jabatan->nama_jabatan!!} || {!! $data->Golongan->nama_golongan!!} </option>
							@endforeach
						</select>

						@if (isset($error)) 
						<div>Maaf Tunjangan Tidak Terdaftar!!! Buat Terlebih Dahulu Tunjangan!!!</div>
						@endif
						
						@if ($errors->has('pegawai_id'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
				                                    </span>
				        @endif
					</div>
				<div class="form-group">
				{!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
				{!! Form::close() !!}
				</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	@endsection