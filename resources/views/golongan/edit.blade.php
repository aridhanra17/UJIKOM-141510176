@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading">EDIT GOLONGAN</div>
                	<div class="panel-body">
                	{!! Form::model($gol,['method'=>'PATCH', 'route'=>['golongan.update', $gol->id]]) !!}
                		<div class="form-group {{ $errors->has('kode_golongan') ? ' has-error' : 'pesan' }}">

							{!! Form::label('Kode Golongan','Kode Golongan :') !!}
							{!!Form::text('kode_golongan',null,['class'=>'form-control']) !!}
							@if ($errors->has('kode_golongan'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('kode_golongan') }}</strong>
				                                    </span>
				                                @endif
						
						</div>
						<div class="form-group{{ $errors->has('nama_golongan') ? ' has-error' : 'pesan' }}">
							{!! Form::label('Nama Golongan','Nama Golongan :') !!}
							{!!Form::text('nama_golongan',null,['class'=>'form-control']) !!}
							@if ($errors->has('nama_golongan'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('nama_golongan') }}</strong>
				                                    </span>
				                                @endif
						
						</div>
						<div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : 'pesan' }}">
							{!! Form::label('Besaran Uang','Besaran Uang :') !!}
							{!!Form::text('besaran_uang',null,['class'=>'form-control']) !!}
							@if(isset($err))
									<div>Maaf Besaran Uang Tidak Boleh Nol !!!</div>
							@endif
					        @if(isset($error))
									<div>Maaf Besaran Uang Tidak Boleh Negatif !!!</div>
								@endif
							@if ($errors->has('besaran_uang'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
				                                    </span>
				                                @endif
						</div>
						<div class="form-group">
							{!! Form::submit('Save', ['class'=>'btn btn-primary form control']) !!}
							{!! Form::close() !!}
						</div>

            </div>
        </div>
    </div>
</div>
@endsection

