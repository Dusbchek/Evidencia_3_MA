<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_pets extends Model
{
    use HasFactory;




    protected $fillable = ['pet_id', 'customer_id'];

    // Relación inversa con Customer
    public function customer()
    {
        return $this->belongsTo(customer::class);
    }

    // Relación inversa con Pet
    public function pet()
    {
        return $this->belongsTo(pets::class);
    }
}