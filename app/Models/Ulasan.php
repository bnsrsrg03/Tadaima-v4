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

   public function getCommentAttribute($value)
{
    if (is_null($value)) {
        return null; // atau bisa juga return ''; tergantung kebutuhan
    }

    return BadWordFilter::filter($value);
}

}
