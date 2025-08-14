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
        Schema::create('resume_projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('resume_id');

            $table->string('name', 200);
            $table->string('link', 255)->nullable();
            $table->text('description')->nullable();

            $table->json('stack')->nullable();      // ["Laravel","Nuxt","Postgres"]
            $table->json('highlights')->nullable(); // bullets

            $table->integer('order_index')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('resume_id')->references('id')->on('resumes')->cascadeOnDelete();
            $table->index(['resume_id', 'order_index']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_projects');
    }
};
