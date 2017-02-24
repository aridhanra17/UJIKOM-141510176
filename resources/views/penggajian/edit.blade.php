@extends('layouts.appd')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-primary">
                <div class="panel-heading">Tambah Penggajian</div>
                <div class="panel-body">
                    {!! Form::model($peng,['method'=>'PATCH', 'route'=>['penggajian.update', $peng->id]]) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('status_pengambilan') ? ' has-error' : '' }}">
                            <label for="status_pengambilan" class="col-md-4 control-label">Status Pengambilan</label>

                            <div class="col-md-6">
                                <select name="status_pengambilan" class="form-control">
                                    <option value="0">Belum Diambil</option>
                                    <option value="1">Sudah Diambil</option>
                                </select>
                                @if ($errors->has('status_pengambilan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status_pengambilan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
