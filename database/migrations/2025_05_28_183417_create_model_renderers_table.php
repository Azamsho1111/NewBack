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
        Schema::create('model_renderers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->constrained('model3_d_s');
            $table->foreignId('renderer_id')->constrained('renderers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_renderers');
    }
};
