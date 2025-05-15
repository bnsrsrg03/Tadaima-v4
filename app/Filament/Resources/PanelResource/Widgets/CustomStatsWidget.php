<?php
namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Contracts\View\View;  // Pastikan ini di-import

class CustomStatsWidget extends Widget
{
    // Tentukan tampilan yang akan digunakan untuk widget ini
    protected static string $view = 'filament.widgets.custom-stats-widget';

    public function render(): View  // Tambahkan tipe return View
    {
        // Menampilkan beberapa kartu statistik di dalam widget
        return view('filament.widgets.custom-stats-widget', [
            'cards' => [
                Card::make('Total Sales', 120)
                    ->color('success')  
                    ->icon('heroicon-o-shopping-cart'),
                Card::make('New Orders', 34)
                    ->color('primary')
                    ->icon('heroicon-o-clipboard-check'),
            ],
        ]);
    }
}
