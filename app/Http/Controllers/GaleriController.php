<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::all(); // atau ->paginate(12)
        return view('galeri', compact('galeris'));
    }
}
