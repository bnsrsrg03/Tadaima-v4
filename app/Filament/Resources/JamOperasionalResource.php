<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\JamOperasional;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\JamOperasionalResource\Pages;
use App\Filament\Resources\JamOperasionalResource\RelationManagers;

class JamOperasionalResource extends Resource
{
    protected static ?string $model = JamOperasional::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationLabel = 'Jam Operasional';

    protected static ?string $navigationGroup = 'Tentang Kami';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('day')
                        ->options([
                            'senin' => 'Senin',
                            'selasa' => 'Selasa',
                            'rabu' => 'Rabu',
                            'kamis' => 'Kamis',
                            'jumat' => 'Jumat',
                            'sabtu' => 'Sabtu',
                            'minggu' => 'Minggu',                       
                        ])
                        ->required()
                        ->label('Hari')
                        ->rules([
                            function (\Filament\Forms\Get $get) {
                                return \Illuminate\Validation\Rule::unique('jam_operasional', 'day')
                                    ->ignore(request()->route('record')); // pengecualian saat edit
                            },
                        ])
                        ->validationMessages([
                            'unique' => 'Hari yang sudah diinput sudah ada sebelumnya.',
                        ]),

                        TimePicker::make('open_time')
                        ->label('Jam Buka')
                        ->required(),
        
                        TimePicker::make('close_time')
                        ->label('Jam Tutup')
                        ->required(),
                ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('day')
                ->label('Hari')
                ->searchable(),

                Tables\Columns\TextColumn::make('open_time')
                 ->label('Jam Buka')
                 ->time('H:i'),

                Tables\Columns\TextColumn::make('close_time')
                ->label('Jam Tutup')
                ->time('H:i'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListJamOperasionals::route('/'),
            'create' => Pages\CreateJamOperasional::route('/create'),
            'edit' => Pages\EditJamOperasional::route('/{record}/edit'),
        ];
    }
}
