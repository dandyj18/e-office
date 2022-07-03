<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Autentikasi
Route::get('/login', [App\Http\Controllers\LogController::class, 'login'])->name('login');
Route::post('/login/login_action', [App\Http\Controllers\LogController::class, 'postLogin'])->name('postlogin');
Route::get('/register', [App\Http\Controllers\LogController::class, 'register'])->name('register');
Route::post('/register/register_action', [App\Http\Controllers\LogController::class, 'postRegister'])->name('postRegister');
Route::get('/logout', [App\Http\Controllers\LogController::class, 'logout'])->name('logout');

Route::get('/index', [App\Http\Controllers\AdminController::class, 'home']);
Route::get('/dashboard2', [App\Http\Controllers\AdminController::class, 'dashboard']);

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function() {
        $role = (int)\Illuminate\Support\Facades\Auth::user()->role;

        if($role === 1){
            return redirect()->route('admin.home');
        }
        return redirect()->route('user.home');
    })->name('dashboard');

    //Admin 
    Route::prefix('admin')->name('admin.')->middleware('CekAdmin:1')->group(function(){
        Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'home'])->name('home');
        Route::get('/home', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');

        //Admin/surat_masuk
        Route::get('/surat_masuk', [App\Http\Controllers\AdminController::class, 'sumasuk'])->name('surat_masuk');
        Route::get('/surat_masuk/tambah_masuk', [App\Http\Controllers\AdminController::class, 't_masuk']);
        Route::post('/surat_masuk/tambah_masuk/tambah_masuk_aksi', [App\Http\Controllers\AdminController::class, 't_masuk_aksi']);
        Route::get('/surat_masuk/hapus/{id}', [App\Http\Controllers\AdminController::class, 'hapusmasuk']);
        Route::get('/surat_masuk/edit_masuk/{id}', [App\Http\Controllers\AdminController::class, 'editmasuk']);
        Route::post('/surat_masuk/update/{id}', [App\Http\Controllers\AdminController::class, 'updatemasuk']);
        Route::get('/surat_masuk/download/{id}', [App\Http\Controllers\AdminController::class, 'unduhmasuk']);

        //Admin/surat_keluar
        Route::get('/surat_keluar', [App\Http\Controllers\AdminController::class, 'sukeluar'])->name('surat_keluar');
        Route::get('/surat_keluar/tambah_keluar', [App\Http\Controllers\AdminController::class, 't_keluar']);
        Route::post('/surat_keluar/tambah_keluar/tambah_keluar_aksi', [App\Http\Controllers\AdminController::class, 't_keluar_aksi']);

        Route::get('/surat_keluar/download/{id}', [App\Http\Controllers\AdminController::class, 'unduhkeluar']);
        Route::get('/surat_keluar/tambah_keluar', [App\Http\Controllers\LogController::class, 'user']);
        Route::get('/edit/{id}', [App\Http\Controllers\LogController::class, 'user']);
    
        
        Route::get('/surat_keluar/hapus/{id}', [App\Http\Controllers\AdminController::class, 'hapuskeluar']);

        Route::get('/select_list', [App\Http\Controllers\AdminController::class, 'user']);
        Route::get('/edit/{id}', [App\Http\Controllers\AdminController::class, 'editkeluar']);
        Route::post('/update/{id}', [App\Http\Controllers\AdminController::class, 'updatekeluar']);

        //Karyawan
        Route::get('/data-karyawan', [App\Http\Controllers\AdminController::class, 'karyawan'])->name('karyawan');
        Route::get('/data-karyawan/hapus/{id}', [App\Http\Controllers\AdminController::class, 'hapuskaryawan']);
        Route::get('/data-karyawan/edit_karyawan/{id}', [App\Http\Controllers\AdminController::class, 'editkaryawan']);
        Route::post('/data-karyawan/update/{id}', [App\Http\Controllers\AdminController::class, 'updatekaryawan']);

    });

    //User
    Route::prefix('user')->name('user.')->middleware('CekAdmin:2')->group(function(){
        Route::get('/dashboard', [App\Http\Controllers\UserController::class,'home'])->name('home');
        Route::get('/download/{id}', [App\Http\Controllers\UserController::class, 'unduhmasuk']);
        Route::get('/surat_masuk_user', [App\Http\Controllers\UserController::class, 'masuk'])->name('surat_masuk_user');
        Route::get('/surat_masuk_user/approve/{id}', [App\Http\Controllers\UserController::class, 'editmasuk'])->name('approve');
        Route::post('/aksi/{id}', [App\Http\Controllers\UserController::class, 'updatemasuk']);
    });
});