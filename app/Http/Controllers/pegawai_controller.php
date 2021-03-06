<?php

namespace App\Http\Controllers;


use Request;
use App\Pegawai;
use App\Jabatan;
use App\Golongan;
use App\Kategori_lembur;
use App\User;
use File;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Input;

class pegawai_controller extends Controller
{
    use RegistersUsers;
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
        $pegawai = Pegawai::paginate(5);
        $golongan = Golongan::all();
        $jabatan = Jabatan::all();
        return view('pegawai.index', compact('pegawai','golongan','jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jb = Jabatan::all();
        $gol = Golongan::all();
        $user = User::all();
        return view('pegawai.create', compact('jb','gol','user'));

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
       
        $peg = array (
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'nip'=>'required|unique:pegawais',
                    'jabatan_id'=>'required',
                    'golongan_id'=>'required',
            );
        $pesan = array(
            'nip.unique' => 'Maaf Sudah Ada',
            'jabatan_id.required' =>'Harus Diisi broo',
            'golongan_id.required' =>'Harus Diisi broo',
            );
        

        $validation = Validator::make(Request::all(), $peg, $pesan);
        if($validation->fails())
        {
            return redirect('pegawai/create')->withErrors($validation)->withInput();
        }

            $user =  new User ;
            $user ->name=Input::get('name');
            $user ->email=Input::get('email');
            $user ->password=bcrypt(Input::get('password'));
            $user ->permission=Input::get('permission');
            $user->save();

        // $file = $request->file('photo');
        // $destinationPath = public_path().'/gambar';     
        // $filename = str_random(6).'_'.$file->getClientOriginalName();
        // $uploadSuccess= $file->move($destinationPath, $filename);

        if(Input::hasFile('photo'))
        {
            //mengambil file yg di up
            $uploaded_photo = Input::file('photo');
            //mengambil extension file
            $extension = $uploaded_photo->getClientOriginalExtension();
            //membuat nama file random berikut estension
            $filename = md5(time()) . '.' . $extension;
            //menyimpan cover ke folder public/gambar
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'gambar';
            $uploaded_photo->move($destinationPath, $filename);
            //mmengisi field cover di var dgn file nam yg baru dibuat

            $tambah = new Pegawai;
            $tambah->nip =Request::get('nip');
            $tambah->user_id = $user->id;
            $tambah->jabatan_id = Request::get('jabatan_id');
            $tambah->golongan_id = Request::get('golongan_id');
            $tambah->photo = $filename;
            $tambah->save();
        }
        elseif(!isset($photo))
        {
            $tambah = new Pegawai;
            $tambah->nip =Request::get('nip');
            $tambah->user_id = $user->id;
            $tambah->jabatan_id = Request::get('jabatan_id');
            $tambah->golongan_id = Request::get('golongan_id');
            $tambah->photo = 0;
            $tambah->save();
        }

        $kl = Kategori_lembur::where('jabatan_id', $tambah->jabatan_id)->where('golongan_id', $tambah->golongan_id)->first();
        if(isset($kl))
        {
            return redirect('pegawai');
        }
        else
        {
            $kategori_lembur = new Kategori_lembur;
            $kategori_lembur->jabatan_id=$tambah->jabatan_id;
            $kategori_lembur->golongan_id=$tambah->golongan_id;
            $tanggal = date('Y-m-d H:i:s');
            $kategori_lembur->kode_lembur="KodeLem"."-".$tanggal."-".$tambah->jabatan_id."-".$tambah->golongan_id;
            $kategori_lembur->besaran_uang=0;
            $kategori_lembur->save();
          return redirect('pegawai');
        }
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
        $user = User::all();
        $jab = Jabatan::all();
        $gol = Golongan::all();
        $pegawai = Pegawai::find($id);
        return view('pegawai.read', compact('pegawai','user','jab','gol'));
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
        $peg = Pegawai::find($id);
        $jab = Jabatan::all();
        $gol = Golongan::all();
        $jab1 = Jabatan::whereIn('id',[$peg->jabatan_id])->first();
        $gol1= Golongan::whereIn('id', [$peg->golongan_id])->first();

        $jab2 = Jabatan::whereNotIn('id',[$peg->jabatan_id])->get();
        $gol2 = Golongan::whereNotIn('id', [$peg->golongan_id])->get();

        return view('pegawai.edit', compact('peg','jab1','gol1','jab2', 'gol2','jab','gol'));
        
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
        $cariid = Pegawai::find($id);

        $cariid->nip = Input::get('nip');
        $cariid->jabatan_id = Input::get('jabatan_id');
        $cariid->golongan_id = Input::get('golongan_id');
        $cariid->updated_at = date('Y-m-d H:i:s');

        
        if(Input::hasFile('photo'))
        {
            $filename = null;
            $uploaded_photo = Input::file('photo');
            $extension = $uploaded_photo->getClientOriginalExtension();
            //membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'gambar';
            //pindah file
            $uploaded_photo->move($destinationPath, $filename);
            //hapus cover lama, jika ada
            
            if($cariid->photo)
            {
                $old_photo = $cariid->photo;
                $filepath = public_path(). DIRECTORY_SEPARATOR . 'gambar' . DIRECTORY_SEPARATOR . $cariid->photo;
                try{
                    File::delete($filepath);
                }
                catch (FileNotFoundException $e) {
                    //File Sudah Dihapus / Tidak Ada
                }
            }
            $cariid->photo = $filename;
            

        }
        $cariid->save();
        return redirect('pegawai');


        
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
        Pegawai::find($id)->delete();
        return redirect('pegawai');
    }
}
