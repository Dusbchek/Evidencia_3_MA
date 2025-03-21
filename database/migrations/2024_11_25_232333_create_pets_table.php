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
        Schema::create('pets', function (Blueprint $table) {
            $table->id(); // id (BigInteger, auto-incremental)
            $table->string('name'); // name (Varchar)
            $table->foreignId('type_id')->constrained('pet_types')->onDelete('cascade'); // typeId (BigInteger) FK
            $table->boolean('in_treatment'); // inTreatment (boolean)
            $table->timestamps(); // Campos created_at y updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
