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

    protected $fillable = [ 'comment']; // Kolom yang bisa diisi

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($ulasan) {
            $ulasan->comment = BadWordFilter::filter($ulasan->comment);
        });
    }
}
