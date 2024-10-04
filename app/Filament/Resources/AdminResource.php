<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminResource\Pages;
use App\Filament\Resources\AdminResource\RelationManagers;
use App\Filament\Resources\AdminRessourceResource\RelationManagers\PostTypeRelationManager;
use App\Models\Admin;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Component;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('username')->required(),
                Forms\Components\TextInput::make('name')->required()
                    ->required(),
                Forms\Components\TextInput::make('email')->required()
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('password')->required(),

                Forms\Components\TextInput::make('phone_number')->required(),

                // MultiSelect for assigning roles to the admin
                MultiSelect::make('roles')
                    ->relationship('roles', 'name')
                    ->preload()
                    ->label('Roles'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("username"),
                TextColumn::make("email"),
                TextColumn::make("password"),
                TextColumn::make("phone_number"),
                TextColumn::make("created_at"),
                TextColumn::make("updated_at"),
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }
}
