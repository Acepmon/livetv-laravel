<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChannelResource\Pages;
use App\Filament\Resources\ChannelResource\RelationManagers;
use App\Models\Channel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Enums\UserRole;

class ChannelResource extends Resource
{
    protected static ?string $model = Channel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Creator')
                    ->aside()
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship(
                                name: 'user',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn (Builder $query) => $query->where('role', UserRole::CREATOR)->withTrashed(),
                            )->required(),
                    ]),

                Forms\Components\Section::make('Channel Info')
                    ->aside()
                    ->schema([
                        Forms\Components\TextInput::make('name')->label('Channel Name')->required()->minLength(3)->maxLength(255),
                        Forms\Components\TextInput::make('slug')->label('Unique Slug')->required()->minLength(3)->maxLength(100)->unique(ignoreRecord: true),
                        Forms\Components\Textarea::make('desc')->label('Channel Description'),
                    ]),

                Forms\Components\Section::make('Media')
                    ->aside()
                    ->schema([
                        Forms\Components\FileUpload::make('image_url')
                            ->label('Thumbnail Image')
                            ->directory('channel/thumbnail')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                            ])
                            ->previewable(true),
                        Forms\Components\FileUpload::make('cover_url')
                            ->label('Cover Image')
                            ->directory('channel/cover')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                            ])
                            ->previewable(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('slug')->color('primary'),
                Tables\Columns\TextColumn::make('user.name')->label('Owner'),
                Tables\Columns\TextColumn::make('visibility')->label('Visibility'),
                Tables\Columns\TextColumn::make('created_at')->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
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
            'index' => Pages\ListChannels::route('/'),
            'create' => Pages\CreateChannel::route('/create'),
            'edit' => Pages\EditChannel::route('/{record}/edit'),
        ];
    }    
}
