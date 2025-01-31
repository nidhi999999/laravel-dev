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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('experience');
            $table->string('salary');
            $table->string('location');
            $table->text('description');
            $table->string('company_name');
            $table->string('company_logo')->nullable();
            $table->string('extra')->nullable();
            $table->timestamps();
        });

        Schema::create('job_post_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_post_id')->constrained('job_posts')->onDelete('cascade');
            $table->foreignId('skill_id')->constrained('skills')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_skill');
    }
};
