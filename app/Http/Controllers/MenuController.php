<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Ulasan;

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

   public function bestseller()
{
    $menus = Menu::where('bestseller', true)->get();
    return view('menu.bestseller', compact('menus'));
}

public function show(Menu $menu)
{
    $menu->load('kategori');

    $ulasan = Ulasan::where('menu_id', $menu->id)->latest()->paginate(5);

    $ratingCount = Ulasan::where('menu_id', $menu->id)
                    ->selectRaw('rating, COUNT(*) as count')
                    ->groupBy('rating')
                    ->pluck('count', 'rating')
                    ->toArray();

    $totalPenilaian = array_sum($ratingCount);

    // Ganti 'komentar' menjadi 'comment'
    $totalUlasan = Ulasan::where('menu_id', $menu->id)
                     ->whereNotNull('comment')
                     ->count();

    $avgRating = $totalPenilaian > 0
        ? number_format(Ulasan::where('menu_id', $menu->id)->avg('rating'), 1)
        : 0;

    $ratingPercentage = [];
    for ($i = 1; $i <= 5; $i++) {
        $ratingPercentage[$i] = $totalPenilaian > 0
            ? ($ratingCount[$i] ?? 0) / $totalPenilaian * 100
            : 0;
    }

    // Supaya property rating ada di object menu untuk view
    $menu->rating = $avgRating;

    return view('menus.show', compact(
        'menu', 'ulasan', 'ratingCount', 'ratingPercentage',
        'totalPenilaian', 'totalUlasan'
    ));
}

}