<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Pagination\Paginator;


class MenuController extends Controller
{
    public function makanan()
    {
        $kategori = Kategori::where('name', 'makanan')->firstOrFail();
        $menus = $kategori->menus()->get();
        return view('menu.makanan', compact('menus'));
    }
    
    public function minuman()
    {
        $kategori = Kategori::where('name', 'minuman')->firstOrFail();
        $menus = $kategori->menus()->get();
        return view('menu.minuman', compact('menus'));
    }
    
    public function cemilan()
    {
        $kategori = Kategori::where('name', 'cemilan')->firstOrFail();
        $menus = $kategori->menus()->get();
        return view('menu.cemilan', compact('menus'));
    }
    
    
    
}
