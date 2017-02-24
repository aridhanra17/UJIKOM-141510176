@extends('layouts.appd')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-primary">
            <div class="panel-heading ">PENGGAJIAN</div>
				
            </div>
            </div>
        </div>  
 <div class="panel-body panel-primary">
                @if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Keuangan" )
                    <center><a href="{{route('penggajian.create')}}" class="btn btn-success">Hitung Peggajian</a></center>
                @endif
                    <center>{{$penggajian->links()}}</center>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr class="bg-info">
                <th>No</th>
                <th>Id Pegawai</th>
                <th>Jumlah Jam Lembur</th>
                <th>Jumlah Uang Lembur</th>
                <th>Gaji Pokok</th>
                <th>Total Gaji</th>
                <th>Tanggal Pengambilan</th>
                <th>Status Pengambilan</th>
                <th>Petugas Penerima</th>
                @if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Keuangan" )
                <th colspan="2"><center>Action</center></th>
                @endif
            </tr>
        </thead>
        @php
        $no = 1;
        @endphp
        @foreach($penggajian as $data)
        <tbody>
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->Tujangan_pegawai->Pegawai->user->name}}</td>
                <td>{{$data->jumlah_jam_lembur}} Jam </td>
                <?php $data->jumlah_uang_lembur=number_format($data->jumlah_uang_lembur,2,',','.'); ?>
                <td>Rp. {{$data->jumlah_uang_lembur}} </td>

                <?php $data->gaji_pokok=number_format($data->gaji_pokok,2,',','.'); ?>
                <td>Rp. {{$data->gaji_pokok}} </td>

                <?php $data->total_gaji=number_format($data->total_gaji,2,',','.'); ?>
                <td>Rp. {{$data->total_gaji}} </td>
                @if($data->status_pengambilan == 0)
                
                    <td>Belum Diambil </td>
                
                @endif
                @if($data->status_pengambilan == 1)
                
                    <td>{{$data->updated_at}}</td>
                
                @endif

                @if($data->status_pengambilan == 0)
                
                    <td>Belum Diambil </td>
                
                @endif
                @if($data->status_pengambilan == 1)
                
                    <td>Sudah Diambil</td>
                
                @endif
                <td>{{$data->petugas_penerima}} </td>

                @if(  Auth::user()->permission  == "Super Admin" || Auth::user()->permission  == "Keuangan" )
                <td><center><a href="{{route('penggajian.edit', $data->id)}}" class="btn btn-warning">Edit</a></center></td>

                <td><center>
                    <form method="POST" action="{{route('penggajian.destroy', $data->id)}}">
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

@endsection
        