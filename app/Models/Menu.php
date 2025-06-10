<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

  protected $fillable = [
        'kategori_id',
        'name',
        'description', // Deskripsi menu
        'price',
        'image',
        'bestseller',
    ];
   public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function ulasan()
{
    return $this->hasMany(\App\Models\Ulasan::class);
}

}
