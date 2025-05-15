<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_id', 'name', 'description', 'price', 'image', 'bestseller']; // Kolom yang bisa diisi

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }
}
