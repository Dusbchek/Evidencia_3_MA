<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pets_types extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relación uno a muchos con Pets
    public function pets()
    {
        return $this->hasMany(Pets::class);
    }

    // Relación uno a muchos con DoctorMain
    public function doctorMains()
    {
        return $this->hasMany(doctor_mains::class, 'pet_type_id');
    }
}
