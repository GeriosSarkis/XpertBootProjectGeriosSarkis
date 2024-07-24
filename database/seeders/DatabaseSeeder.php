<?php

namespace Database\Seeders;

use App\Models\admin;
use App\Models\category;
use App\Models\media;
use App\Models\Post;
use App\Models\tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create posts
        $posts = Post::factory()->count(10)->create();

        // Create tags
        $tags = tag::factory()->count(5)->create();
        $category= category::factory()->count(5)->create();
        $media= media::factory()->count(5)->create();
        $admin= admin::factory()->count(3)->create();

        // Attach tags to posts
        $posts->each(function ($post) use ($tags) {
            $post->tags()->attach(
                $tags->random(2)->pluck('id')->toArray() // Attach 2 random tags to each post
            );
        });
        $posts->each(function ($post) use ($category) {
            $post->category()->attach(
                $category->random(2)->pluck('id')->toArray() // Attach 2 random tags to each post
            );
        });
        $posts->each(function ($post) use ($media) {
            $post->media()->attach(
                $media->random(2)->pluck('id')->toArray() // Attach 2 random tags to each post
            );
        });
        $posts->each(function ($post) use ($admin) {
            $post->admin()->attach(
                $admin->random(2)->pluck('id')->toArray() // Attach 2 random tags to each post
            );
        });
    }
}
