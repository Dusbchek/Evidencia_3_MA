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
        Schema::create('user_pets', function (Blueprint $table) {
            $table->id(); // id (BigInteger, auto-incremental)
            $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade'); // petId (BigInteger) FK
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade'); // customerId (BigInteger) FK
            $table->timestamps(); // Campos created_at y updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_pets');
    }
};
