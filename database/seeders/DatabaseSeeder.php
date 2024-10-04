<?php
use App\Models\Admin;
use App\Models\Category;
use App\Models\Media;
use App\Models\Post;
use App\Models\PostType;
use App\Models\User;
use App\Models\_PostType;
use App\Models\Tag;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        ///fix dbb problenm and seed
        ///
        // Create models
        $user = User::factory()->count(1)->create();
        $posts_type = PostType::factory()->count(20)->create();
        $posts = Post::factory()->count(10)->create();
        $tags = Tag::factory()->count(5)->create();
        $categories = Category::factory()->count(5)->create(); // Corrected plural name
        $media = Media::factory()->count(5)->create();
        $admins = Admin::factory()->count(3)->create(); // Corrected plural name
        $this->call(RolePermissionSeeder::class);
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
//        $posts->each(function ($posts) use ($categories) {
//            // Attach one or more random categories to the post
//            $posts->category_post()->attach(
//                $categories->random(rand(1, $categories->count()))->pluck('id')->toArray()
//            );
//        });

        $posts_type->each(function ($posts_type) use ($categories) {
            // Attach one or more random categories to the post
            $posts_type->categories()->attach(
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
