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
        Schema::create('table_post', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("content");

            $table->unsignedBigInteger('media_id')->nullable();

            $table->foreign('media_id')->references('id')->on('table_media');
            $table->unsignedBigInteger('admin_id')->nullable();

            $table->foreign('admin_id')->references('id')->on('table_admin');
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
        Schema::dropIfExists('table_post');
    }
};