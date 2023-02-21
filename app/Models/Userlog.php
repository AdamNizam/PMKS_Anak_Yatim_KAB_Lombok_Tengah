<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userlog extends Model
{
    use HasFactory;
    protected $table = "userlog";
    protected $primaryKey = 'id_userlog';
    protected $fillable = [
        'username', 'password', 'aktif', 'id_role',
    ];
}
