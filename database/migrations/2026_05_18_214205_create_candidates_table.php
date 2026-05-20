<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('full_name');
            $table->string('cpf')->unique()->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->text('description')->nullable();
            $table->string('resume_url')->nullable();
            $table->string('profile_photo_url')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};