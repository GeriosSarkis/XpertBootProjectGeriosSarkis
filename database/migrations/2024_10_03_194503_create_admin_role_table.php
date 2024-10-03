<?php

use App\Models\Admin;
use App\Models\Role;
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
        Schema::create('admin_role', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Admin::class);
            $table->foreignIdFor(\App\Models\CustomRole::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_role');
    }
};
