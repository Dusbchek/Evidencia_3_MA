<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address'];

    // Relación uno a muchos con Pets a través de UserPets
 
    public function customer() { return $this->belongsTo(Customer::class); }
    // Relación uno a muchos con UserPets
    public function userPets()
    {
        return $this->hasMany(user_pets::class);
    }
}