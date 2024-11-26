<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class treatments extends Model
{
    use HasFactory;




    protected $fillable = ['name', 'description', 'doctor_id', 'date', 'is_finished',"pet_id"];

    /**
     * Relación muchos a muchos con Pet
     * A través de la tabla pivote `pets_treatment`
     */
    public function pets()
    {
        return $this->belongsToMany(Pets::class, 'pets_treatment');
    }

    /**
     * Relación uno a muchos con DoctorTreat
     * Un tratamiento puede estar asociado con varios doctores
     */
    public function doctorTreats()
    {
        return $this->hasMany(doctor_treats::class, 'treat_id');
    }

    public function pet()
    {
        return $this->belongsTo(Pets::class, 'pet_id');
    }

    /**
     * Relación inversa con Doctor
     * Un tratamiento es realizado por un solo doctor
     */
    public function doctor()
    {
        return $this->belongsTo(doctors::class);
    }
}
