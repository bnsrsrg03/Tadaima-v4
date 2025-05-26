<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Kolom-kolom yang bisa diisi secara mass-assignment
    protected $fillable = [
        'kategori_id',
        'name',
        'description', // Deskripsi menu
        'price',
        'image',
        'bestseller',
    ];

    // Relasi ke model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
