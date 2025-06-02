<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ulasan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Set;
use App\Services\BadWordFilter;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Filament\Resources\UlasanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UlasanResource\RelationManagers;

class UlasanResource extends Resource
{
    protected static ?string $model = Ulasan::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center';

    protected static ?string $navigationLabel = 'Ulasan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('comment')
                    ->required()
                    ->label('Komentar')
                    ->maxLength(1000)
                    ->live(onBlur: true)
                    ->dehydrateStateUsing(fn ($state) => BadWordFilter::filter($state))
                    ->afterStateUpdated(function ($state, Set $set) {
                        if ($state && BadWordFilter::hasBadWords($state)) {
                            Log::warning('Attempted inappropriate comment: ' . $state);

                            Notification::make()
                                ->title('Peringatan!')
                                ->body('Komentar mengandung kata-kata yang tidak sopan. Komentar akan difilter secara otomatis.')
                                ->danger()
                                ->persistent()
                                ->send();
                            
                            // Filter dan update nilai textarea
                            $filteredText = BadWordFilter::filter($state);
                            $set('comment', $filteredText);
                        }
                    })
                    ->helperText('Komentar yang mengandung kata-kata tidak sopan akan difilter secara otomatis.')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('comment')
                ->label('Komentar')
                ->wrap()
                ->limit(50),
            ])
            ->filters([
                // Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make()
                ->label('Selengkapnya')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUlasans::route('/'),
            'create' => Pages\CreateUlasan::route('/create'), //
            'edit' => Pages\EditUlasan::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
