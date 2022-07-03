<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\keluar;
use App\Models\masuk;
use App\Models\User;
use App\Models\karyawan;
use File;

class AdminController extends Controller
{
    
    public function sumasuk()
    {
        $masuk = masuk::all();

        return view('content.surat_masuk',['masuk' => $masuk]);
    }

    public function sumasukdas()
    {
        $masuk = masuk::count();

        return view('content.dashboard',['masuk' => $masuk]);
    }

    public function keluarsukses()
    {
        $sukses = keluar::where('status','Sukses')->count();

        return view('content.dashboard',['keluar' => $sukses]);
    }

    public function keluarproses()
    {
        $proses = keluar::where('status','Proses')->count();

        return view('content.dashboard',['keluar' => $proses]);
    }

    public function home()
    {
        $karyawan = karyawan::count();
        $proses = keluar::where('status','Proses')->count();
        $sukses = keluar::where('status','Sukses')->count();
        $masuk = masuk::count();

        return view('content.dashboard', ['masuk' => $masuk, 'proses' => $proses, 'sukses' => $sukses , 'karyawan' => $karyawan]);
        /*return view('content.dashboard');*/
    }

    public function dashboard(){
        $karyawan = karyawan::count();
        $proses = keluar::where('status','Proses')->count();
        $sukses = keluar::where('status','Sukses')->count();
        $masuk = masuk::count();

        return view('content.dashboard', ['masuk' => $masuk, 'proses' => $proses, 'sukses' => $sukses , 'karyawan' => $karyawan]);
    }

    public function t_masuk()
    {
        return view('content.form_tmasuk');
    }

    public function t_masuk_aksi(Request $request)
    {
        $request -> validate([
            'no_surat' => 'required',
            'pengirim' => 'required',
            'perihal' => 'required',
            'tgl_surat' => 'required',
            'tgl_masuk' => 'required',
            'file_surat' => 'required',
            'file_surat.*' => 'mimes:doc,docx,pdf|max:2000'
        ]);

        $file = $request->file('file_surat');
        
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = 'data_file_masuk';
        $file->move($tujuan_upload,$nama_file);

        $masuk = masuk::create([
            'no_surat' => $request->no_surat,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'tgl_surat' => $request->tgl_surat,
            'tgl_masuk' => $request->tgl_masuk,
            'file_surat' => $nama_file
        ]);

        return redirect()->route('admin.surat_masuk');
    }

    public function editmasuk($id)
    {
        $masuk = masuk::find($id);
        return view('content.edit_masuk', ['masuk' => $masuk]);
    }

    public function updatemasuk($id, Request $request)
    {
        $this->validate($request,[
            'no_surat' => 'required',
            'pengirim' => 'required',
            'perihal' => 'required',
            'tgl_surat' => 'required',
            'tgl_masuk' => 'required',
            'file_surat' => 'required',
            'file_surat.*' => 'mimes:doc,docx,pdf|max:2000'
        ]);

        $repo = masuk::findOrFail($id);
        File::delete('data_file_masuk/'.$repo->file_surat);

        $file = $request->file('file_surat');
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = 'data_file_masuk';
        $file->move($tujuan_upload,$nama_file);
    
        $masuk = masuk::find($id);
        $masuk->no_surat = $request->no_surat;
        $masuk->pengirim = $request->pengirim;
        $masuk->perihal = $request->perihal;
        $masuk->tgl_surat = $request->tgl_surat;
        $masuk->tgl_masuk = $request->tgl_masuk;
        $masuk->file_surat = $nama_file;
        $masuk->save();
        return redirect()->route('admin.surat_masuk');
    }

    public function hapusmasuk($id)
    {
        $masuk = masuk::findOrFail($id);
        File::delete('data_file_masuk/'.$masuk->file_surat);

        $masuk->delete();
        return redirect()->route('admin.surat_masuk');
    }

    public function unduhmasuk($id){
        $repo = masuk::findOrFail($id);
        $file_path = public_path(). '/data_file_masuk/'. $repo->file_surat;

        return response()->download($file_path, $repo->file_surat);    
    }

    public function sukeluar()
    {
        $keluar = keluar::all();

        return view('content.surat_keluar',['keluar' => $keluar]);
    }

    public function sukeluardas()
    {
        $keluar = keluar::count();

        return view('content.dashboard',['keluar' => $keluar]);
    }

    public function t_keluar()
    {
        return view('content.form_tkeluar');
    }

    public function t_keluar_aksi(Request $request)
    {
       
        $request -> validate([
            'no_suratkeluar' => 'required',
            'users_id' => 'required',
            'perihal_keluar' => 'required',
            'tgl_keluar' => 'required',
            'status' => 'required',
            'file_surat' => 'required',
            'file_surat.*' => 'mimes:doc,docx,pdf|max:2000'
        ]);

        $file = $request->file('file_surat');
        
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
        
        
        $keluar = keluar::create([
            'no_suratkeluar' => $request->no_suratkeluar,
            'users_id' => $request->users_id,
            'perihal_keluar' => $request->perihal_keluar,
            'tgl_keluar' => $request->tgl_keluar,
            'status' => $request->status,
            'file_surat' => $nama_file
        ]);

        return redirect()->route('admin.surat_keluar');
    }

    public function unduhkeluar($id){
        $repo = keluar::findOrFail($id);
        $file_path = public_path(). '/data_file/'. $repo->file_surat;

        return response()->download($file_path, $repo->file_surat);    
    }

    public function hapuskeluar($id)
    {
        $keluar = keluar::findOrFail($id);
        File::delete('data_file/'.$keluar->file_surat);

        $keluar->delete();
        return redirect()->route('admin.surat_keluar');
    }

    public function editkeluar($id)
    {
        $keluar = keluar::findOrFail($id);
        $users = User::all();

        return view('content.edit_keluar', ['keluar' => $keluar,'users'=>$users]);
    }

    public function user()
    {
        $users = User::all();

        return view('content.edit_keluar',['users' => $users]);
    }


    public function updatekeluar($id, Request $request)
    {
        $this->validate($request,[
        'no_suratkeluar' => 'required',
        'users_id' => 'required',
        'perihal_keluar' => 'required',
        'tgl_keluar' => 'required',
        'status' => 'required',
        'file_surat' => 'required',
        'file_surat.*' => 'mimes:doc,docx,pdf|max:2000'
        ]);

            $repo = keluar::findOrFail($id);
            File::delete('data_file/'.$repo->file_surat);

            $file = $request->file('file_surat');
            $nama_file = time()."_".$file->getClientOriginalName();

            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file);
        
            $keluar = keluar::find($id);
            $keluar->no_suratkeluar = $request->no_suratkeluar;
            $keluar->users_id = $request->users_id;
            $keluar->perihal_keluar = $request->perihal_keluar;
            $keluar->file_surat = $nama_file;
            $keluar->save();
            
            return redirect()->route('admin.surat_keluar');
    }

    public function total_karyawan()
    {
        $total_karyawan = karyawan::count();
        
        return view('content.dashboard',compact('datakaryawan'));
    }

    public function karyawan()
    {
        $karyawan = karyawan::all();

        return view('content.karyawan',['karyawan' => $karyawan]);
    }

    public function hapuskaryawan($id)
    {
        $karyawan = karyawan::findOrFail($id);
        $user = $karyawan->users_id;

        $deletekaryawan = karyawan::findOrFail($id)->delete();
        $deleteuser = User::find($user)->delete();
        
        return redirect()->route('admin.karyawan');
    }

    public function editkaryawan($id)
    {
        $karyawan = karyawan::findOrFail($id);
        $users = User::all();

        return view('content.edit_karyawan', ['karyawan' => $karyawan,'users'=>$users]);
    }

    public function updatekaryawan($id, Request $request)
    {
        $this->validate($request,[
            'nama_karyawan' => 'required',
            'jabatan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat_karyawan' => 'required',
        ]);

        $karyawan = karyawan::find($id);
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->alamat_karyawan = $request->alamat_karyawan;
        $karyawan->save();

        $user = $karyawan->users_id;
        $edituser = User::find($user);
        $edituser->name = $karyawan->nama_karyawan;
        $edituser->save();

        return redirect()->route('admin.karyawan');
    }
}
