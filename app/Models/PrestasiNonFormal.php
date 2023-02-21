<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiNonFormal extends Model
{
    use HasFactory;
    protected $table = "prestasi_non_formal";
    protected $primaryKey = 'id_prestasi_non_formal';
    protected $fillable = [
        'prestasi_non_formal', 'id_anak', 'tahun', 'bukti'
    ];
}
