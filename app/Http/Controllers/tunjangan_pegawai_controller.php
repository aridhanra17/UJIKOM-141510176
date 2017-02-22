<?php

namespace App\Http\Controllers;

use Request;
use App\Tunjangan_pegawai;
use App\Tunjangan;
use App\Pegawai;
use App\User;
use Validator;


class tunjangan_pegawai_controller extends Controller
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
        $tp = Tunjangan_pegawai::paginate(5);
        $tun = Tunjangan::all();
        $user = User::all();
        //dd($tp);
        return view('tunjangan_pegawai.index',compact('tp','tun','user'));
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
        $tun = Tunjangan::all();
        return view('tunjangan_pegawai.create', compact('peg','tun'));
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
        $tp = array (
            'pegawai_id'=>'required|unique:tunjangan_pegawais',
            'kode_tunjangan_id' => 'required',
            );
        $pesan = array(
            'pegawai_id.unique' =>'Maaf Tunjangan Pegawai Sudah Ada',
            'pegawai_id.required' =>'Harus Diisi broo',
            'kode_tunjangan_id.required' =>'Harus Diisi broo',
            );

        $validation = Validator::make(Request::all(), $tp, $pesan);

        if($validation->fails())
        {
            return redirect('tunjangan_pegawai/create')->withErrors($validation)->withInput();
        }

        $tunjangan_pegawai = Request::all();
        //dd($tunjangan_pegawai);
        $pegawai = Pegawai::where('id', $tunjangan_pegawai['pegawai_id'])->first();
        //dd($pegawai);
        $check = Tunjangan::where('jabatan_id', $pegawai->jabatan_id)->where('golongan_id', $pegawai->golongan_id)->first();
        //dd($check);
        $data_tunpeg = Tunjangan_pegawai::where('pegawai_id', $pegawai->id)->first();

            if(!isset ($check->id))
            {
                    $peg = Pegawai::all();
                    $tun = Tunjangan::all();
                    $error = true;
                    return view('tunjangan_pegawai.create', compact('peg','tun','error'));
                
            }

        
        $tunjangan_pegawai['kode_tunjangan_id'] = $check->id;
        Tunjangan_pegawai::create($tunjangan_pegawai);
        
        return redirect('tunjangan_pegawai');
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
        $tp = Tunjangan_pegawai::find($id);
        $tun = Tunjangan::all();
        $peg = Pegawai::all();
        return view('tunjangan_pegawai.edit', compact('tp','tun','peg'));
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
        $tp = Request::all();
        //dd($tp);
        $pegawai = Pegawai::where('id', $tp['pegawai_id'])->first();

        $check = Tunjangan::where('jabatan_id', $pegawai->jabatan_id)->where('golongan_id', $pegawai->golongan_id)->first();

        if(!isset ($check->id))
        {
            $peg = Pegawai::all();
            $tun = Tunjangan::all();
            $error = true;
        return view('tunjangan_pegawai.create', compact('peg','tun','error'));
        }
        $tun_peg = Tunjangan_pegawai::find($id);
        $tun_peg->update($tp);
        return redirect('tunjangan_pegawai');
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
        Tunjangan_pegawai::find($id)->delete();
        return redirect('tunjangan_pegawai');
    }
}
