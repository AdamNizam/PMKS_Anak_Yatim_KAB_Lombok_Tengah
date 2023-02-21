<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiFormal extends Model
{
    use HasFactory;
    protected $table = "prestasi_formal";
    protected $primaryKey = 'id_prestasi_formal';
    protected $fillable = [
        'prestasi_formal', 'id_anak', 'bukti', 'tahun'
    ];
}
