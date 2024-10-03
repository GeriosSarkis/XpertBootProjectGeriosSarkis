<?php

use App\Models\CustomRole;
use App\Models\PostType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('custom_role_post_type', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PostType::class);
            $table->foreignIdFor(CustomRole::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_role_post_type');
    }
};
