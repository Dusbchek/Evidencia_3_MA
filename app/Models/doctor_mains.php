<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor_mains extends Model
{
    use HasFactory;


    protected $fillable = ['doctor_id', 'pet_type_id'];

    // Relación inversa con Doctor
    public function doctor()
    {
        return $this->belongsTo(doctors::class);
    }

    // Relación inversa con PetType
    public function petType()
    {
        return $this->belongsTo(pets_types::class);
    }
}