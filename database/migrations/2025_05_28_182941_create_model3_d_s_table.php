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
        Schema::create('model3_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->json('tags')->nullable();
            $table->foreignId('status_id')->constrained('statuses');
            $table->foreignId('user_id')->constrained('users');
            $table->decimal('price', 10, 2)->nullable();
            $table->string('format');
            $table->json('softwares')->nullable();
            $table->json('renderers')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model3_d_s');
    }
};
