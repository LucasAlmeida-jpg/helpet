<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    use HasFactory;
    protected $table = 'operacoes';
    protected $fillable = ['procedimento'];

    public function pets()
    {
        return $this->belongsToMany(Pet::class, 'pet_operacao');
    }
}
