<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survior extends Model
{
    use HasFactory;
    protected $table = "survior";
    protected $primaryKey = 'id_survior';
    protected $fillable = [
        'id_userlog', 'id_kecamatan', 'id_desa', 'nama_lengkap', 'nomor_sk', 'nik', 'alamat', 'email', 'no_hp', 'file_sk'
    ];
}
