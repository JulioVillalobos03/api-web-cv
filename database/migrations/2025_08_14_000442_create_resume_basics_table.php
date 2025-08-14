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
        Schema::create('resume_basics', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('resume_id');

            $table->string('full_name', 120);
            $table->string('headline', 160)->nullable();
            $table->string('email', 160)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('location', 120)->nullable();
            $table->string('website', 255)->nullable();
            $table->text('summary')->nullable();

            $table->json('social_links')->nullable(); // [{type,label,url}, ...]

            $table->timestamps();

            $table->foreign('resume_id')->references('id')->on('resumes')->cascadeOnDelete();
            $table->unique('resume_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_basics');
    }
};
