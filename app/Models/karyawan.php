<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;

    protected $table = "datakaryawan";
 
    protected $fillable = ['id','users_id','nama_karyawan','jabatan','jenis_kelamin','alamat_karyawan'];
    

    public function users()
    {
        return $this->hasOne(User::class);
    }
}
