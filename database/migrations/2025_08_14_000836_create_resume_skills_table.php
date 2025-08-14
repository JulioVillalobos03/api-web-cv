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
        Schema::create('resume_skills', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('resume_id');

            $table->string('label', 100);     // "Laravel"
            $table->unsignedSmallInteger('level')->nullable(); // 1..5
            $table->string('category', 80)->nullable(); // "Backend", "Cloud", ...

            $table->integer('order_index')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('resume_id')->references('id')->on('resumes')->cascadeOnDelete();
            $table->index(['resume_id', 'category', 'order_index']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_skills');
    }
};
