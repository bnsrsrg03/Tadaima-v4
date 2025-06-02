<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Karyawan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KaryawanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KaryawanResource\RelationManagers;

class KaryawanResource extends Resource
{
    protected static ?string $model = Karyawan::class;

    protected static ?string $navigationIcon = 'heroicon-o-user'; // Mengatur Icon dari Heroicons

    protected static ?string $navigationLabel = 'Karyawan'; // Mengatur nama label dari sidebar

    protected static ?string $navigationGroup = 'Tentang Kami'; // Mengatur nama group dari sidebar

    protected static ?string $label ='Kelola Karyawan'; // Mengatur nama label dari header 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                
                TextInput::make('position')
                    ->label('Posisi')
                    ->required(),
            
                FileUpload::make('image')
                    ->image() // ini penting agar hanya gambar
                    ->directory('menu-images') // folder penyimpanan di storage/app/public/menu-images
                    ->disk('public')
                    ->required()
                    ->label('Gambar'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public') // pastikan disk yang digunakan sesuai
                    ->height(80), // opsional, bisa diatur tinggi gambar
                    
                TextColumn::make('name')
                    ->searchable(),
               
                TextColumn::make('position'),
             



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
            'index' => Pages\ListKaryawans::route('/'),
            'create' => Pages\CreateKaryawan::route('/create'),
            'edit' => Pages\EditKaryawan::route('/{record}/edit'),
        ];
    }
}
