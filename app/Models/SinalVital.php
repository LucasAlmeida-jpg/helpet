<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinalVital extends Model
{
    use HasFactory;

    protected $table = 'sinais_vitais';
    protected $fillable = ['description', 'pet_name'];

    public function pets()
    {
        return $this->belongsToMany(Pet::class);
    }
}
