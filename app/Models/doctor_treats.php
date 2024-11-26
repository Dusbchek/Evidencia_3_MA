<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor_treats extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id', 'treat_id'];

    // Relación inversa con Doctor
    public function doctor()
    {
        return $this->belongsTo(doctors::class);
    }

    // Relación inversa con Treatment
    public function treatment()
    {
        return $this->belongsTo(treatments::class, 'treat_id');
    }
}