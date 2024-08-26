<?php

use App\Http\Requests\CategoryRequest;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Post;
use App\Models\category;
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
            $table->foreignIdFor(_PostType::class);
            $table->foreignIdFor(category::class);
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
