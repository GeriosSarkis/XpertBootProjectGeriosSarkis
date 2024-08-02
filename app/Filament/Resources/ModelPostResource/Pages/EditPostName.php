<?php

namespace App\Filament\Resources\ModelNameResource\Pages;

use App\Filament\Resources\ModelPostResource;
use App\Http\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPostName extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
