<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
    protected $fillable = ['name', 'type_id', 'in_treatment',"age"];

    // Relación uno a uno con PetType
    public function type()
    {
        return $this->belongsTo(pets_types::class, 'type_id');
    }

    public function pets()
    {
        return $this->hasManyThrough(Pets::class, user_pets::class, 'customer_id', 'id', 'id', 'pet_id');
    }

// Pet.php
public function customer()
{
    return $this->belongsTo(Customer::class);
}

public function treatments()
    {
        return $this->hasMany(Treatments::class, 'pet_id');
    }
    // Relación uno a muchos con UserPets
    public function userPets()
    {
        return $this->hasMany(user_pets::class);
    }

    
}