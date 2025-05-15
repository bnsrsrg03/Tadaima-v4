<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Karyawan;
use App\Models\JamOperasional;


class TentangController extends Controller
{
    public function index()
    {
        $galeris = Galeri::all();
        $karyawans = Karyawan::all();
        $jamOperasional = JamOperasional::all();
    
        return view('halaman.tentang', compact('galeris', 'karyawans', 'jamOperasional'));
    }
}

