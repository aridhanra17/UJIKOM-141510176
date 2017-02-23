<?php

namespace App\Http\Controllers;

use Request;
use App\Lembur_pegawai;
use App\Kategori_lembur;
use App\Pegawai;
use DB;
use Validator;
use Carbon\Carbon;

class lembur_pegawai_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $lp = Lembur_pegawai::with('Kategori_lembur')->paginate(5);
        $kt = Kategori_lembur::all();
        $tanggal = Carbon::now()->toDateString();
        return view('lembur.index', compact('lp', 'kt','tanggal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $peg = Pegawai::all();
        $kl = Kategori_lembur::all();
        return view('lembur.create', compact('peg','kl'));
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
        $kl = array (
            'pegawai_id'=>'required',
            'jumlah_jam'=>'required',
            );
        $pesan = array(
            'pegawai_id.required' =>'Harus Diisi broo',
            'jumlah_jam.required' =>'Harus Diisi broo',
            );

        $validation = Validator::make(Request::all(), $kl, $pesan);

        if($validation->fails())
        {
            return redirect('lembur/create')->withErrors($validation)->withInput();
        }

        $lembur_pegawai = Request::all();
        // dd($tunjangan_pegawai);
        $pegawai = Pegawai::where('id', $lembur_pegawai['pegawai_id'])->first();
        //dd($pegawai);
        $check = Kategori_lembur::where('jabatan_id', $pegawai->jabatan_id)->where('golongan_id', $pegawai->golongan_id)->first();
        $data_lempeg = Lembur_pegawai::where('pegawai_id', $pegawai->id)->first();

        if(!isset ($check->id))
            {
                $peg = Pegawai::all();
                $lem = Kategori_lembur::all();
                $error = true;
                return view('lembur.create', compact('peg','lem','error'));
            }

        $lembur_pegawai['kode_lembur_id'] = $check->id;
        Lembur_pegawai::create($lembur_pegawai);
        return redirect('lembur_pegawai');

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
        $lp = Lembur_pegawai::find($id);
        $kl = Kategori_lembur::all();
        $peg = Pegawai::all();
        return view('lembur.edit', compact('lp','kl','peg'));

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
        $lp = Request::all();
        $lem_peg = Lembur_pegawai::find($id);
        $lem_peg->update($lp);
        return redirect('lembur_pegawai');
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
        Lembur_pegawai::find($id)->delete();
        return redirect('lembur_pegawai');
    }
}
