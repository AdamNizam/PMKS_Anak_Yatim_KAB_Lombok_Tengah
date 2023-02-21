<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verifikator extends Model
{
    use HasFactory;
    protected $table = "verifikator";
    protected $primaryKey = 'id_verifikator';
    protected $fillable = [
        'id_userlog', 'nama_lengkap', 'nomor_sk', 'nik', 'alamat', 'email', 'no_hp', 'file_sk'
    ];
}
