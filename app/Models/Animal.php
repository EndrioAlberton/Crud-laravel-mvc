<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;  
    public $rules = [ 
        'nome' => 'required|min:5|max:80', 
        'especie_id' => 'required', 
        'caracteristicas' => 'required|min:10|max:100', 
        ];  
    public $messages = [ 
        'nome.required' => 'O campo nome é obrigatório', 
        'nome.min' => 'O  nome deve conter ao menos 5 caracteres', 
        'especie_id.required' => 'O campo especie é obrigatório',
        'caracteristicas.required' => 'O campo caracteristicas é obrigatório', 
        'caracteristicas.min' => 'As caracteristicas devem conter ao menos 10 caracteres', 
    ];  
    public $timestamps = false; 
    protected $table = "animais";
    protected $fillable = ['nome', 'caracteristicas', 'especie_id', 'foto']; 
    public function searchAnimais()
        {
            return Animal::select('animais.id','animais.nome as nome', 'especies.nome
            as especie_id', 'animais.caracteristicas', 'animais.foto')
            ->join('especies', 'animais.especie_id', '=', 'especies.id');
        }  
} 

