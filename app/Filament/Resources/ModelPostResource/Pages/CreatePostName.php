<?php

namespace App\Filament\Resources\ModelNameResource\Pages;

use App\Filament\Resources\ModelPostResource;
use App\Http\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePostName extends CreateRecord
{
    protected static string $resource = PostResource::class;

}
