<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->string('modality')->nullable();
            $table->string('work_schedule')->nullable();
            $table->string('contract_type')->nullable();

            $table->decimal('salary', 10, 2)->nullable();

            $table->text('description');
            $table->text('requirements')->nullable();

            $table->string('status')->default('OPEN');

            $table->foreignId('company_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
