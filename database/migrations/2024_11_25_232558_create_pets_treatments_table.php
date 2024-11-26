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
        Schema::create('pets_treatment', function (Blueprint $table) {
            $table->id(); // id (BigInteger, auto-incremental)
            $table->foreignId('treatment_id')->constrained('treatments')->onDelete('cascade'); // treatmentId (BigInteger) FK
            $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade'); // petsId (BigInteger) FK
            $table->timestamps(); // Campos created_at y updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets_treatments');
    }
};
