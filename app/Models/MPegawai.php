<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $fillable = [
        'nama', 'jk', 'nik', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'no_telepon', 'email',
        'status_pernikahan', 'jabatan', 'status_kepegawaian', 'nip', 'pendidikan_terakhir', 'foto'
    ];
}
