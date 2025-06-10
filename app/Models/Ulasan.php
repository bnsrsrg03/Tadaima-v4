<?php

namespace App\Models;

use App\Services\BadWordFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ulasan extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Izinkan semua field yang akan diisi lewat controller
    protected $fillable = ['menu_id', 'rating', 'comment'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($ulasan) {
            $ulasan->comment = BadWordFilter::filter($ulasan->comment);
        });
    }
}
