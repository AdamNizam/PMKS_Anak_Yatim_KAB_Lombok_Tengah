<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $table = "desa";
    protected $primaryKey = 'id_desa';
    protected $fillable = [
        'id_kecamatan', 'nama_desa'
    ];
}