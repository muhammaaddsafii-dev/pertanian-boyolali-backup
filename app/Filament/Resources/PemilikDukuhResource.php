<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemilikDukuhResource\Pages;
use App\Filament\Resources\PemilikDukuhResource\RelationManagers;
use App\Models\PemilikDukuh;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PemilikDukuhResource extends Resource
{
    protected static ?string $model = PemilikDukuh::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('PMLK')->label('Pemilik')->nullable(),
                Forms\Components\TextInput::make('NIK_2')->label('NIK Pemilik')->nullable(),
                Forms\Components\TextInput::make('ALMT_2')->label('Alamat Pemilik')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('KECAMATAN')
                    ->name('KECAMATAN')
                    ->label('Kecamatan')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('DESA')
                    ->label('Desa')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('PMLK')
                    ->label('Pemilik')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('NIK_2')
                    ->label('NIK Pemilik')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('ALMT_2')
                    ->label('Alamat Pemilik')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPemilikDukuhs::route('/'),
            'create' => Pages\CreatePemilikDukuh::route('/create'),
            'edit' => Pages\EditPemilikDukuh::route('/{record}/edit'),
        ];
    }

    protected static bool $shouldRegisterNavigation = false;
}