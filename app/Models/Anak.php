<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;
    protected $table = "anak";
    protected $primaryKey = 'id_anak';
    protected $fillable = [
        'id_survior', 'id_pekerjaan_wali', 'id_pendidikan', 'id_kecamatan', 'id_desa', 'id_dusun', 'id_kelas_pendidikan', 'nama_anak', 'nomor_kk', 'nomor_nik', 'alamat', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'usia', 'nama_wali', 'alamat_sekolah', 'status_anak', 'foto_anak', 'status_verifikasi', 'latitide', 'longitude', 'tahun'
    ];
}
