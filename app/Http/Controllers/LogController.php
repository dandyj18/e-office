<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\karyawan;
use Illuminate\Support\Facades\Hash;

class LogController extends Controller
{
    public function login()
    {
        return view('auth/page_login');
    }

    public function register()
    {
        return view('auth/page_register');
    }

    public function user()
    {
        $users = User::all();

        return view('content.form_tkeluar',['users' => $users]);
    }

    public function postRegister(Request $request){

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:255',
            'name' => 'required|max:255',
            'jabatan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat_karyawan' => 'required',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        $user = User::create($validateData);

        $data = new karyawan;
        $data->users_id = $user->id;
        $data->nama_karyawan = $user->name;
        $data->jabatan = $validateData['jabatan'];
        $data->jenis_kelamin = $validateData['jenis_kelamin'];
        $data->alamat_karyawan = $validateData['alamat_karyawan'];
        $data->save();


        $request->session()->flash('success','Registration Successfull! Please Login');

        return redirect()->route('login');
    }
     
    public function postLogin(Request $request)
    {    
        
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
            
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
        
        return back()->with('loginError','Login Failed!');

    }

    public function logout(Request $request)
    {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login');
    }

}
