<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'description',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
