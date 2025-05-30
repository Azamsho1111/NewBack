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
        Schema::create('moderation_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->constrained('model3_d_s');
            $table->foreignId('user_id')->constrained('users');
            $table->text('comment');
            $table->enum('type', ['info', 'reject']);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moderation_comments');
    }
};
