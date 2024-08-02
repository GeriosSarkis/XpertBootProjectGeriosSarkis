<?php

namespace App\Filament\Resources\ModelNameResource\Pages;

use App\Http\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostsNames extends ListRecords
{
    protected static string $resource = PostResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
