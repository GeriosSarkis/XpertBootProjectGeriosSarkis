<?php

namespace App\Filament\Resources\PostTypeResource\Pages;

use App\Filament\Resources\PostTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePostType extends CreateRecord
{
    protected static string $resource = PostTypeResource::class;
}
