<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pets_treatment extends Model
{
    use HasFactory;
    

    protected $fillable = ['treatment_id', 'pet_id'];

    // Relación inversa con Treatment
    public function treatment()
    {
        return $this->belongsTo(treatments::class);
    }

    // Relación inversa con Pet
    public function pet()
    {
        return $this->belongsTo(pets::class);
    }
}
