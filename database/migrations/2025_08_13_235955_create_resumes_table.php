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
        Schema::create('resumes', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // users.id por defecto es BIGINT en Laravel; usamos foreignId:
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('title', 120);
            $table->string('slug', 160)->unique();
            $table->boolean('is_public')->default(false);

            $table->string('template_key', 80)->nullable();

            // Tema / apariencia
            $table->string('theme_primary', 32)->default('indigo');
            $table->string('theme_font_size', 16)->default('base');
            $table->string('theme_density', 16)->default('comfortable');
            $table->json('print_options')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
