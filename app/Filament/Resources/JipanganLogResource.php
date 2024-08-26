<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JipanganLogResource\Pages;
use App\Filament\Resources\JipanganLogResource\RelationManagers;
use App\Models\JipanganLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JipanganLogResource extends Resource
{
    protected static ?string $model = JipanganLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jipangan.DNOP')->label('DNOP'),
                Tables\Columns\TextColumn::make('user.name')->label('Changed by'),
                Tables\Columns\TextColumn::make('changed_field')->label('Field'),
                Tables\Columns\TextColumn::make('old_value')->label('Old Value'),
                Tables\Columns\TextColumn::make('new_value')->label('New Value'),
                Tables\Columns\TextColumn::make('created_at')->label('Changed At')->dateTime(),
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
            'index' => Pages\ListJipanganLogs::route('/'),
            'create' => Pages\CreateJipanganLog::route('/create'),
            'edit' => Pages\EditJipanganLog::route('/{record}/edit'),
        ];
    }

    protected static bool $shouldRegisterNavigation = false;
}