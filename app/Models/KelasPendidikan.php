<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasPendidikan extends Model
{
    use HasFactory;
    protected $table = "kelas_pendidikan";
    protected $primaryKey = 'id_kelas_pendidikan';
    protected $fillable = [
        'kelas_pendidikan'
    ];
}
