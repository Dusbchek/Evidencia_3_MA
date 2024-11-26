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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id(); // id (BigInteger, auto-incremental)
            $table->string('name'); // name (Varchar)
            $table->text('description'); // description (Varchar)
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade'); // doctorId (Varchar) FK
            $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade'); // petId (BigInteger) FK

            $table->date('date'); // date (Date)
            $table->boolean('is_finished'); // isFinish (Boolean)
            $table->timestamps(); // Campos created_at y updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
