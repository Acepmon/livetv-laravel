<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Enums\CreatorLevel;
use Filament\Forms\Get;
use App\Filament\Resources\UserResource\Pages\CreateUser;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Member';
    protected static ?string $navigationLabel = 'Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Info')
                    ->aside()
                    ->schema([
                        Forms\Components\FileUpload::make('avatar_url')
                            ->label('Avatar Image')
                            ->directory('avatars')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                            ])
                            ->previewable(true),
                        Forms\Components\TextInput::make('name')->required()->minLength(3)->maxLength(100),
                        Forms\Components\TextInput::make('email')->required()->email(),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->aside()
                    ->schema([
                        Forms\Components\Select::make('role')->required()
                            ->options(UserRole::class)->default(UserRole::USER),
                        Forms\Components\Select::make('status')->required()
                            ->options(UserStatus::class)->default(UserStatus::ACTIVE),
                        Forms\Components\TextInput::make('password')->required(fn ($livewire) => $livewire instanceof CreateUser)
                            ->password()
                            ->dehydrated(fn ($state) => filled($state)),
                    ]),

                Forms\Components\Section::make('Creator Info')
                    ->description('This section is only visible to users with the "Creator" role.')
                    ->aside()
                    ->schema([
                        Forms\Components\Select::make('creator_level')
                            ->required()
                            ->options(CreatorLevel::class)
                            ->default(CreatorLevel::GENERAL),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar_url')->label('Avatar')->circular(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\IconColumn::make('email_verified_at')->boolean()->label('Verified')->tooltip(fn (Model $model): string => "By {$model->email_verified_at}"),
                Tables\Columns\TextColumn::make('created_at')->since(),
            ])
            ->filters([
                Tables\Filters\Filter::make('verified')->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
                Tables\Filters\SelectFilter::make('role')
                    ->options(UserRole::class),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
