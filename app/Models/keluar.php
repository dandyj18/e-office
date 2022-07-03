<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keluar extends Model
{
    use HasFactory;

    protected $table = "suratkeluar";
 
    protected $fillable = ['id','no_suratkeluar','users_id','perihal_keluar','tgl_keluar','status','file_surat'];
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
