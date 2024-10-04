<?php

namespace App\Filament\Resources\PostTypeResource\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\PostTypeResource;
use Filament\Resources\Pages\ListRecords;
 // Import the correct CreateAction
use Filament\Tables\Actions\Action as TableAction; // Correct import for table row actions

class ListPostTypes extends ListRecords
{
    protected static string $resource = PostTypeResource::class;

    // Header action for creating a new post type
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(), // This adds the "Create Post Type" button
        ];
    }

    // Row action to create a post for a specific post type
    protected function getTableActions(): array
    {
        return [

            TableAction::make('createPost')
                ->label('Add Post')
                ->url(fn ($record) => route('filament.admin.resources.posts.create', ['post_type_id' => $record->id]))
                ->icon('heroicon-o-plus'),
        ];
    }


}

?>
