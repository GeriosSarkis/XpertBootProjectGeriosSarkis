<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminResource\Pages;
use App\Filament\Resources\AdminResource\RelationManagers;
use App\Models\Admin;
use Filament\Forms;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('username')
                    ->required(),

                TextInput::make('name')
                    ->required(),

                TextInput::make('email')
                    ->required()
                    ->email(),

                TextInput::make('password')
                    ->password()  // Mark as a password field
                    ->dehydrateStateUsing(fn ($state) => $state ? Hash::make($state) : null)  // Hash the password when saving, only if provided
                    ->required(fn ($livewire) => $livewire instanceof Pages\CreateAdmin)  // Only required on creation
                    ->nullable()  // Allow it to be null for updates
                    ->label('Password'),

                TextInput::make('phone_number')
                    ->required(),

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
                TextColumn::make('username'),
                TextColumn::make('email'),
                // Password should not be displayed in the table
                TextColumn::make('phone_number'),
                TextColumn::make('created_at')
                    ->dateTime(),
                TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Define relations here if needed
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
