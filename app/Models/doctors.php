<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctors extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'main_type_id', 'email', 'phone', 'treat_id'];

    // Relación uno a muchos con DoctorMain
    public function doctorMains()
    {
        return $this->hasMany(doctor_mains::class, 'doctor_id');
    }

    // Relación uno a uno con PetType (especialización principal)
    public function mainType()
    {
        return $this->belongsTo(pets_types::class, 'main_type_id');
    }

    // Relación muchos a muchos con Treatments (DoctorTreats)
    public function treatments()
    {
        return $this->belongsToMany(treatments::class, 'doctor_treats', 'doctor_id', 'treat_id');
    }
}