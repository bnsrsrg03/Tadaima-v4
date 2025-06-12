<?php

namespace App\Filament\Resources;

use App\Models\Ulasan;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use App\Services\BadWordFilter;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Filament\Resources\UlasanResource\Pages;

class UlasanResource extends Resource
{
    protected static ?string $model = Ulasan::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center';
    protected static ?string $navigationLabel = 'Ulasan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('rating')
                    ->label('Rating')
                    ->options([
                        1 => '1 - Buruk',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5 - Bagus',
                    ])
                    ->required(),

                Textarea::make('comment')
                    ->label('Komentar')
                    ->required()
                    ->maxLength(1000)
                    ->live(onBlur: true)
                    ->dehydrateStateUsing(fn ($state) => BadWordFilter::filter($state))
                    ->afterStateUpdated(function ($state, $set) {
                        if ($state && BadWordFilter::hasBadWords($state)) {
                            Log::warning('Attempted inappropriate comment: ' . $state);

                            Notification::make()
                                ->title('Peringatan!')
                                ->body('Komentar mengandung kata-kata tidak sopan. Komentar akan difilter secara otomatis.')
                                ->danger()
                                ->persistent()
                                ->send();

                            $filtered = BadWordFilter::filter($state);
                            $set('comment', $filtered);
                        }
                    })
                    ->helperText('Komentar yang mengandung kata-kata tidak sopan akan difilter.')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('menu.name')
                    ->label('Menu')
                    ->searchable(),
                TextColumn::make('rating')
                    ->label('Rating'),
                TextColumn::make('comment')
                    ->label('Komentar')
                    ->wrap(),
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Edit'),
                Tables\Actions\DeleteAction::make()->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUlasans::route('/'),
            'edit' => Pages\EditUlasan::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; // Karena data ditambahkan via controller
    }
}
