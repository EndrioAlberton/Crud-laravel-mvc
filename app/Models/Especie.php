<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    use HasFactory; 
     
    public function searchEspecie()
    {
        $especies= Especie::all();
        foreach ($especies as $name) {
            $especie[$name->id] = $name->nome;
            }
        return $especie;
    }
}
