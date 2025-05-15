<?php

namespace App\Filament\Resources\MenuResource\Pages;

use App\Filament\Resources\MenuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMenus extends ListRecords
{
    protected static string $resource = MenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Menu')
            ->icon('heroicon-o-plus')
            ->color('success')
            ->iconPosition('before')
            ->modalHeading('Tambah Menu')
            ->modalWidth('lg'),
        ];
    }
}
