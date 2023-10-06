<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = ['nama_lengkap', 'instansi', 'alamat', 'jumlah_orang', 'keperluan', 'telpon', 'foto'];

}
