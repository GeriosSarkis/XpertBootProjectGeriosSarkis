<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostTypeResource\Pages;
use App\Filament\Resources\PostTypeResource\RelationManagers;
use App\Models\PostType;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostTypeResource extends Resource
{
    protected static ?string $model = PostType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("name"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name"),

                TextColumn::make("created_at"),
                TextColumn::make("updated_at"),
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
            'index' => Pages\ListPostTypes::route('/'),
            'create' => Pages\CreatePostType::route('/create'),
            'edit' => Pages\EditPostType::route('/{record}/edit'),
        ];
    }
}
