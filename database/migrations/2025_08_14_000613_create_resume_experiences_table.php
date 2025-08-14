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
        Schema::create('resume_experiences', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('resume_id');

            $table->string('company', 160);
            $table->string('role', 160);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_current')->default(false);

            $table->string('location', 160)->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('resume_experiences');
    }
};
