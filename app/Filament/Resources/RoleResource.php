<?php
namespace App\Filament\Resources;

use App\Filament\Resources\PermiionsRelationManagerResource\RelationManagers\PermissionsRelationManager;
use App\Models\CustomRole; // Use the custom Role model
use App\Filament\Resources\RoleResource\Pages;
use Filament\Forms\Components\HasManyRepeater;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RoleResource extends Resource
{
    // Use your custom Role model here
    protected static ?string $model = CustomRole::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Role Name'),

                // Add the HasManyRepeater to manage post types
                HasManyRepeater::make('postTypes')
                    ->relationship('postTypes')
                    ->schema([
                        Forms\Components\TextInput::make('ad_type_name')
                            ->label('Post Type Name')
                            ->required(),
                    ])
                    ->label('Post Types'),
                Forms\Components\MultiSelect::make('permissions')
                    ->relationship('permissions', 'name') // Sync the permissions relationship
                    ->label('Permissions'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
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
            PermissionsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}


