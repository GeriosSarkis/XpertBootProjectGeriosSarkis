<?php

use App\Http\Requests\CategoryRequest;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Post;
use App\Models\category;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_category', function (Blueprint $table) {


            $table->id();
            $table->foreignIdFor(Post::class);
            $table->foreignIdFor(category::class);
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts_category', function (Blueprint $table) {

            //
        });
    }
};
