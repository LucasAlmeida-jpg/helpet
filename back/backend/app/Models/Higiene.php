<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Higiene extends Model
{
    use HasFactory;
    protected $table = 'higiene';
    protected $fillable = ['ultimar'];

    public function pets()
    {
        return $this->belongsToMany(Pet::class);
    }
}
