<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\masuk;
use App\Models\keluar;
use File;

class UserController extends Controller
{
    
    public function home()
    {
        return view('template.user.index_user');
    }

    public function masuk()
    {
        $keluar = keluar::with('users')->get();
        return view('content.user.surat_masuk',['keluar' => $keluar]);
    }


    public function unduhmasuk($id){
        $repo = keluar::findOrFail($id);
        $file_path = public_path(). '/data_file/'. $repo->file_surat;

        return response()->download($file_path, $repo->file_surat);    
    }

    public function editmasuk($id)
    {
        $keluar = keluar::findOrFail($id);
        return view('content.user.form_approve', ['keluar' => $keluar]);
    }

    public function updatemasuk($id, Request $request)
    {
        $this->validate($request,[
            'no_suratkeluar' => 'required',
            'perihal_keluar' => 'required',
            'tgl_keluar' => 'required',
            'status' => 'required',
        ]);
    
        $keluar = keluar::find($id);
        $keluar->no_suratkeluar = $request->no_suratkeluar;
        $keluar->perihal_keluar = $request->perihal_keluar;
        $keluar->tgl_keluar = $request->tgl_keluar;
        $keluar->status = $request->status;
        $keluar->save();


        return redirect()->route('user.surat_masuk_user');
    }

}
