<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamOperasional extends Model
{
    use HasFactory;

    protected $fillable = ['day', 'open_time', 'close_time']; // Kolom yang bisa diisi
    
    // Menentukan nama tabel jika tidak sesuai dengan plural dari nama model
    protected $table = 'jam_operasional'; 
}
