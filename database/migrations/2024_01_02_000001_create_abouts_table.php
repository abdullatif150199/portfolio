<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->longText('bio');
            $table->string('photo_path')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('website_url')->nullable();
            $table->string('resume_url')->nullable();
            $table->unsignedInteger('years_experience')->default(0);
            $table->unsignedInteger('projects_completed')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('abouts'); }
};
