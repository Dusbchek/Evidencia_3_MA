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
        Schema::create('doctor_mains', function (Blueprint $table) {
            $table->id(); // id (BigInteger, auto-incremental)
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade'); // doctorId (BigInteger) FK
            $table->foreignId('pet_type_id')->constrained('pet_types')->onDelete('cascade'); // petsTypeId (BigInteger) FK
            $table->timestamps(); // Campos created_at y updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_mains');
    }
};
