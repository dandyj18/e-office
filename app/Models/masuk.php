<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masuk extends Model
{
    use HasFactory;

    protected $table = "suratmasuk";
 
    protected $fillable = ['id','no_surat','pengirim','perihal','tgl_surat','tgl_masuk','file_surat'];
    
}
