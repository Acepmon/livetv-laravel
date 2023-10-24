<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LiveContentResource\Pages;
use App\Filament\Resources\LiveContentResource\RelationManagers;
use App\Models\LiveContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LiveContentResource extends Resource
{
    protected static ?string $model = LiveContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationLabel = 'Live';

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
                //
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
            'index' => Pages\ListLiveContents::route('/'),
            'edit' => Pages\EditLiveContent::route('/{record}/edit'),
        ];
    }    
}
