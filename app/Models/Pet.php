<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'pets';
    protected $fillable = ['cor', 'tipo', 'tamanho', 'sexo', 'raca_id'];

   
    public function user()
    {
        return $this->belongsToMany(User::class);
    }


    public function raca()
    {
        return $this->belongsTo(Raca::class);
    }


    public function operacao()
    {
        return $this->belongsToMany(Operacao::class, 'pet_operacao');
    }

    public function medicamento()
    {
        return $this->belongsToMany(Medicamento::class, 'pet_medicamento');
    }

    public function sinalVital()
    {
        return $this->belongsTo(SinalVital::class);
    }

    public function higiene()
    {
        return $this->belongsTo(Higiene::class);
    }
}
