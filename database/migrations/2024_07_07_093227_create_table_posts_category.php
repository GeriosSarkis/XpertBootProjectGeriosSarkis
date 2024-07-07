<?php

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
        Schema::create('table_posts_category', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('posts_id')->nullable();

            $table->foreign('posts_id')->references('id')->on('table_post');
            $table->unsignedBigInteger('category_id')->nullable();

            $table->foreign('category_id')->references('id')->on('table_category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_posts_category', function (Blueprint $table) {
            //
        });
    }
};