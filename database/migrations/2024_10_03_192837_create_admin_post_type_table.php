<?php

use App\Models\Admin;
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
        Schema::create('admin_post_type', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Admin::class);
            $table->foreignIdFor(PostType::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_post_type');
    }
};
