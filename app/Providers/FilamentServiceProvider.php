<?php

namespace App\Providers;

use App\Models\PostType;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            $postTypes = PostType::all();

            foreach ($postTypes as $postType) {
                Filament::registerNavigationItems([
                    NavigationItem::make($postType->name)
                        ->url(route('filament.resources.posts.index', ['post_type' => $postType->id]))
                        ->icon('heroicon-o-document-text'),
                ]);
            }
        });
    }
}
