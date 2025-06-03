<?php

namespace App\Filament\Widgets;

use App\Models\Menu;
use App\Models\Ulasan;
use App\Models\Galeri;
use App\Models\Karyawan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Makanan', Menu::where('kategori_id', 1)->count())
                ->description('Total menu makanan yang tersedia')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('info')
                ->chart([7, 3, 4, 5, 6, 3, 5]),

            Stat::make('Minuman', Menu::where('kategori_id', 2)->count())
                ->description('Total menu minuman yang tersedia')
                ->descriptionIcon('heroicon-m-beaker')
                ->color('danger')
                ->chart([3, 5, 7, 6, 3, 5, 4]),

            Stat::make('Cemilan', Menu::where('kategori_id', 3)->count())
                ->description('Total menu cemilan yang tersedia')
                ->descriptionIcon('heroicon-m-cake')
                ->color('black')
                ->chart([4, 5, 3, 6, 3, 7, 5]),

            Stat::make('Ulasan', Ulasan::count())
                ->description('Total ulasan dari pelanggan')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('gray')
                ->chart([4, 7, 3, 5, 6, 3, 4]),

            Stat::make('Galeri', Galeri::count())
                ->description('Total foto dalam galeri')
                ->descriptionIcon('heroicon-m-photo')
                ->color('warning')
                ->chart([5, 3, 7, 5, 4, 6, 3]),

            Stat::make('Karyawan', Karyawan::count())
                ->description('Total karyawan aktif')
                ->descriptionIcon('heroicon-m-users')
                ->color('success')
                ->chart([3, 5, 4, 6, 3, 7, 5]),
        ];
    }
}