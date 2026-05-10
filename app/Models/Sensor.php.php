<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan
    protected $table = 'mahasiswas'; 

    // Kolom yang diizinkan untuk diisi secara massal
    protected $fillable = ['nim', 'nama', 'program_studi']; 
}