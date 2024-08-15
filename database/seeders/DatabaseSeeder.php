<?php
use App\Models\admin;
use App\Models\category;
use App\Models\media;
use App\Models\Post;
use App\Models\Post_PostType;
use App\Models\tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create models
        $posts_type = Post_PostType::factory()->count(20)->create();
        $posts = Post::factory()->count(10)->create();
        $tags = tag::factory()->count(5)->create();
        $categories = category::factory()->count(5)->create(); // Corrected plural name
        $media = media::factory()->count(5)->create();
        $admins = admin::factory()->count(3)->create(); // Corrected plural name

        // Create models

        // ... other models ...

        // Associate posts with post types
        $posts->each(function ($post) use ($posts_type) {
            $post->post_type_id = $posts_type->random()->id;
            $post->save();
        });
        // Attach tags to posts
        $posts->each(function ($post) use ($tags) {
            $post->tags()->attach($tags->random(2)->pluck('id')->toArray());
        });

        // Attach category to posts (assuming a one-to-many relationship)
        $posts->each(function ($post) use ($categories) {
            $post->category_id = $categories->random()->id; // Assuming a single category per post
            $post->save();
        });

        // Attach media to posts (assuming a many-to-many relationship)
        $posts->each(function ($post) use ($media) {
            $post->media()->attach($media->random(2)->pluck('id')->toArray());
        });

        // Attach admin to posts (assuming a many-to-many relationship)
        $posts->each(function ($post) use ($admins) {
            $post->admins()->attach($admins->random(2)->pluck('id')->toArray());
        });
    }
}

?>
