@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">EDIT KATEGORI LEMBUR</div>

                <div class="panel-body">
                {!! Form::model($kl,['method'=>'PATCH', 'route'=>['kategori_lembur.update', $kl->id]]) !!}

					<div class="form-group{{ $errors->has('kode_lembur') ? ' has-error' : 'pesan' }}">
						{!! Form::label('Kode Lembur','Kode Lembur :') !!}
						{!!Form::text('kode_lembur',null,['class'=>'form-control']) !!}
						@if ($errors->has('kode_lembur'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('kode_lembur') }}</strong>
                                                    </span>
                            @endif
					</div>
                    <div class="form-group">
                        {!! Form::label('Besaran Uang','Besaran Uang :') !!}
                        {!!Form::text('besaran_uang',null,['class'=>'form-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Save',['class'=>'btn btn-primary form control']) !!}
                        {!! Form::close() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @endsection