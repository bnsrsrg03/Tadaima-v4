<?php

namespace App\Filament\Widgets;

use App\Models\Menu;
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
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5]),

            Stat::make(' Minuman', Menu::where('kategori_id', 2)->count())
                ->description('Total menu minuman yang tersedia')
                ->descriptionIcon('heroicon-m-beaker')
                ->color('info')
                ->chart([3, 5, 7, 6, 3, 5, 4]),

            Stat::make(' Cemilan', Menu::where('kategori_id', 3)->count())
                ->description('Total menu cemilan yang tersedia')
                ->descriptionIcon('heroicon-m-cake')
                ->color('warning')
                ->chart([4, 5, 3, 6, 3, 7, 5]),
        ];
    }
}