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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id(); // id (BigInteger, auto-incremental)
            $table->string('name'); // name (Varchar)
            $table->foreignId('main_type_id')->constrained('pets_types')->onDelete('cascade'); // mainTypeId (BigInteger) FK
            $table->string('email'); // email (Varchar)
            $table->string('phone'); // phone (Varchar)
            $table->timestamps(); // Campos created_at y updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
