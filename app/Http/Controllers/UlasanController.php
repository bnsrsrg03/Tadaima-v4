<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    // Menampilkan semua ulasan (misal untuk admin)
    public function index()
    {
        $ulasans = Ulasan::latest()->paginate(5); 
        return view('ulasan.index', compact('ulasans'));
    }

    // Menyimpan ulasan baru
public function store(Request $request, $menuId)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
    ]);

    Ulasan::create([
        'menu_id' => $menuId,
        'user_id' => auth()->id(),
        'rating' => $request->rating,
        'comment' => $request->comment, // boleh kosong
    ]);

        return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan.');
    }
}
