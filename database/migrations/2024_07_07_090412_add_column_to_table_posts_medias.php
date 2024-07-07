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
        Schema::table('table_posts_medias', function (Blueprint $table) {
            $table->integer("post_id");
            $table->integer("media_id");
            $table->unsignedBigInteger('post_id');

            $table->foreign('posts_id')->references('id')->on('table_post');
            $table->unsignedBigInteger('media_id');

            $table->foreign('media_id')->references('id')->on('table_media');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_posts_medias', function (Blueprint $table) {
            //
        });
    }
};