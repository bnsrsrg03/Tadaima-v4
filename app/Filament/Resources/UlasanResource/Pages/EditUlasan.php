<?php

namespace App\Filament\Resources\UlasanResource\Pages;

use App\Filament\Resources\UlasanResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditUlasan extends EditRecord
{
    protected static string $resource = UlasanResource::class;

    protected function getRedirectUrl(): string
    {
        return UlasanResource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        // Menampilkan hanya tombol Cancel dan menyembunyikan tombol Save
        $actions = parent::getFormActions();

        // Hapus tombol save
        foreach ($actions as $key => $action) {
            if ($action->getName() === 'save') {
                unset($actions[$key]);
            }
        }

        // Menambahkan tombol cancel
        $actions[] = Action::make('cancel')
            ->label('Cancel')
            ->url(UlasanResource::getUrl('index'))
            ->color('secondary');

        return $actions;
    }
}
