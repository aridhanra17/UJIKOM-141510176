@extends('layouts.appd')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-black panel-primary">
                <div class="panel-heading">EDIT PEGAWAI</div>

                <div class="panel-body">
                {!! Form::model($peg,['method'=>'PATCH', 'route'=>['pegawai.update', $peg->id] , 'files'=>'true']) !!}

					<div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
						{!! Form::label('NIP','NIP :') !!}
						{!!Form::text('nip',null,['class'=>'form-control']) !!}
						 @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
					</div>
                    <div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
                        {!! Form::label ('Nama Jabatan', ' Nama Jabatan:') !!}
                        <select class="form-control" name="jabatan_id">
                        <option value="">---Nama Jabatan---</option>
                            @foreach($jab as $data)
                            <option value="{!! $data->id!!}">{!! $data->nama_jabatan!!} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('jabatan_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('jabatan_id') }}</strong>
                                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('golongan_id') ? ' has-error' : '' }}">
                        {!! Form::label ('Nama Golongan', ' Nama Golongan:') !!}
                        <select class="form-control" name="golongan_id">
                        <option value="">---Nama Golongan---</option>
                            @foreach($gol as $data)
                            <option value="{!! $data->id!!}">{!! $data->nama_golongan!!} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('golongan_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('golongan_id') }}</strong>
                                                    </span>
                        @endif
                    </div>

                        <div class="form-group">
                            {!! Form::label('Foto', 'Foto :')!!}
                            <br>
                            @php
                            if($peg->photo == 0)
                            { @endphp
                                <img src="gambar/user.png " width="80" height="80">
                            @php}
                            else
                            {@endphp
                                <img src="{{ asset('gambar/'.$peg->photo.'') }}" width="80" height="80"> <br>
                            @php}
                            @endphp
                            
                             <!-- <img src="{{ asset('gambar/'.$peg->photo.'') }}" width="80" height="80"> <br> -->
                           
                            
                            {!! Form::file ('photo', null,['class' => 'form-control']) !!}

                        </div>

                        <div class="form-group">
                            {!!  Form::submit('Save', ['class'=>'btn btn-primary form-control']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection