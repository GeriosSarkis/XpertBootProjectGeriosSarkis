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
        Schema::create('table_roles_admin', function (Blueprint $table) {
            $table->id();
            $table->string("role_name");
            $table->integer("priv"); $table->unsignedBigInteger('admin_id');

            $table->foreign('admin_id')->references('id')->on('table_admin');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_roles_admin');
    }
};