<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Penggajian;
use App\Tunjangan;
use App\Tunjangan_pegawai;
use App\Lembur_pegawai;
use App\Kategori_lembur;
use App\Jabatan;
use App\Golongan;
use App\Pegawai;
use Validator;
use App\User;
use DB;
use Input;

class Gaji_controller extends Controller
{
  	public function index()
  	{
  		$pengguna = User::where('email', auth::user()->email)->first();
  		//dd($pengguna);
  		$pegawai = Pegawai::where('user_id', $pengguna->id )->first();
  		//dd($pegawai);
  		$tp = Tunjangan_pegawai::where('pegawai_id', $pegawai->id)->first();
  		//dd($tp);
  		$gajih = Penggajian::all();
  		//dd($gajih);
  		$gaji = Penggajian::where('tunjangan_pegawai_id', $tp->id)->first();
  		 //dd($gaji);
      $gaji_kar = $gaji->total_gaji;
      //dd($gaji_kar);
  		return view('gaji_pegawai', compact('pengguna','pegawai', 'tp', 'gaji','gajih','gaji_kar')); 
  	}
}
