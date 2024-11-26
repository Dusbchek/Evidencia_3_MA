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
        Schema::create('pet_types', function (Blueprint $table) {
            $table->id(); // id (BigInteger, auto-incremental)
            $table->string('name'); // name (Varchar)
            $table->integer('age'); // age (Integer)
            $table->unsignedBigInteger('customer_id'); // customer_id (BigInteger, unsigned)
            $table->timestamps(); // Campos created_at y updated_at
        
            // Definir la llave foránea
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets_types');
    }
};
