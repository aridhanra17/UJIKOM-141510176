<?php

namespace App\Http\Controllers;

use Request;
use App\Lembur_pegawai;
use App\Kategori_lembur;
use App\Pegawai;
use App\User;
use DB;
use Input;
use Carbon\Carbon;

class Daftar_lemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lem = Lembur_pegawai::all();
        $kt = Kategori_lembur::all();
        $waktu = Carbon::now()->endOfMonth();
        $tanggal = Carbon::now()->toDateString();
        $pegawai= Pegawai::all();
        $rekap = Pegawai::select('pegawais.id', DB::raw('sum(lembur_pegawais.jumlah_jam) as jumlah_jam'))
            ->join('lembur_pegawais', 'lembur_pegawais.pegawai_id', '=', 'pegawais.id')
            ->groupBy('id')
            ->get();
        //dd($rekap);
        return view('lembur.daftar',compact('kt','waktu','tanggal','pegawai', 'rekap','lem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
