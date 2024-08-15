<?php
use App\Models\admin;
use App\Models\category;
use App\Models\media;
use App\Models\Post;
use App\Models\User;
use App\Models\Post_PostType;
use App\Models\tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create models
        $user = User::factory()->count(1)->create();
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

        // $posts->each(function ($post) use ($categories) {
        //     // Attach one or more random categories to the post
        //     $post->category()->attach(
        //         $categories->random(rand(1, $categories->count()))->pluck('id')->toArray()
        //     );
        // });
        $posts->each(function ($posts) use ($categories) {
            // Attach one or more random categories to the post
            $posts->category_post()->attach(
                $categories->random(rand(1, $categories->count()))->pluck('id')->toArray()
            );
        });

        $posts_type->each(function ($posts_type) use ($categories) {
            // Attach one or more random categories to the post
            $posts_type->category_post_type()->attach(
                $categories->random(rand(1, $categories->count()))->pluck('id')->toArray()
            );
        });

        // Attach media to posts (assuming a many-to-many relationship)
        $posts->each(function ($post) use ($media) {
            $post->media()->attach($media->random(2)->pluck('id')->toArray());
        });

        // Attach admin to posts (assuming a many-to-many relationship)
        $posts->each(function ($post) use ($admins) {
            $post->admin()->attach($admins->random(2)->pluck('id')->toArray());
        });
    }
}

?>