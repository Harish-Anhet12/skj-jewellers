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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();

            // Employee who is requesting the leave
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Type of leave
            $table->foreignId('leave_type_id')
                ->constrained('leave_types')
                ->onDelete('cascade');

            // Leave duration
            $table->date('from_date');
            $table->date('to_date');

            // Employee's reason for applying
            $table->text('reason')->nullable();

            // Leave approval status
            $table->enum('status', [
                'Pending',
                'Approved',
                'Rejected'
            ])->default('Pending');

            // Reason provided by admin when rejecting
            $table->text('rejection_reason')->nullable();

            // Admin/manager who approved or rejected
            $table->foreignId('approved_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // When the request was approved/rejected
            $table->timestamp('approved_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};