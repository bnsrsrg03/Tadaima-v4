<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $menus = [
            [
                'nama' => 'Paket Iga bakar',
                'harga' => 'Rp 120.000',
                'gambar' => 'makanan.JPG'
            ],
            [
                'nama' => 'Paket nasi timbel komplit ayam',
                'harga' => 'Rp 95.000',
                'gambar' => 'nasi-timbel.jpg'
            ],
            [
                'nama' => 'Sop Buntut Rempah',
                'harga' => 'Rp 105.000',
                'gambar' => 'sop-buntut.jpg'
            ],
        ];

        return view('home', compact('menus')); }
}
