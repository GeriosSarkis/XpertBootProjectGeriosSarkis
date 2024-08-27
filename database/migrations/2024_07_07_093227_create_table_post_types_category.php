<?php

use App\Http\Requests\CategoryRequest;

use App\Models\PostType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Post;
use App\Models\Category;
use App\Models\_PostType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_type_category', function (Blueprint $table) {


            $table->id();
            $table->foreignIdFor(PostType::class);
            $table->foreignIdFor(Category::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

            Schema::dropIfExists('post_type_category');

    }
};
