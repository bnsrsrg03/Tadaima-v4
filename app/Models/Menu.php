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
        'price',
        'image',
        'bestseller',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function description()
    {
        return $this->hasOne(Description::class);
    }
}
