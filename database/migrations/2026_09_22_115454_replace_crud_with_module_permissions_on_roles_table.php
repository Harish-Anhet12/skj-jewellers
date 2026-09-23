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
        Schema::table('roles', function (Blueprint $table) {
            // Drop old CRUD permission columns
            $table->dropColumn(['can_create', 'can_read', 'can_update', 'can_delete']);

            // Add new module-based permission columns
            $table->boolean('can_dashboard')->default(true);
            $table->boolean('can_user')->default(false);
            $table->boolean('can_role')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn(['can_dashboard', 'can_user', 'can_role']);

            $table->boolean('can_create')->default(false);
            $table->boolean('can_read')->default(false);
            $table->boolean('can_update')->default(false);
            $table->boolean('can_delete')->default(false);
        });
    }
};
