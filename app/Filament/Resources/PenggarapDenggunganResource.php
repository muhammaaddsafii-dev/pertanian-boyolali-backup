<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenggarapDenggunganResource\Pages;
use App\Filament\Resources\PenggarapDenggunganResource\RelationManagers;
use App\Models\PenggarapDenggungan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenggarapDenggunganResource extends Resource
{
    protected static ?string $model = PenggarapDenggungan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('PGRP')->label('Penggarap')->nullable(),
                Forms\Components\TextInput::make('NIK_3')->label('NIK Penggarap')->nullable(),
                Forms\Components\TextInput::make('ALMT_3')->label('Alamat Penggarap')->nullable(),
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
                Tables\Columns\TextColumn::make('PGRP')
                    ->label('Penggarap')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('NIK_2')
                    ->label('NIK Penggarap')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('ALMT_2')
                    ->label('Alamat Penggarap')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPenggarapDenggungans::route('/'),
            'create' => Pages\CreatePenggarapDenggungan::route('/create'),
            'edit' => Pages\EditPenggarapDenggungan::route('/{record}/edit'),
        ];
    }

    protected static bool $shouldRegisterNavigation = false;
}
