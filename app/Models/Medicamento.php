<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;
    protected $table = 'medicamentos';
    protected $fillable = ['nome'];

    public function pets()
    {
        return $this->belongsToMany(Pet::class, 'pet_medicamento');
    }
}
