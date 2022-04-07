<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;  
use Illuminate\Support\Facades\DB;

class AnimaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animais')->insert([
            'nome' => 'Haru',
            'caracteristicas' => 'Preta, fêmea, idade confidencial',
            'especie_id' => '1',
            'foto' => 'fotos/haru.png'
            ]);
            DB::table('animais')->insert([
            'nome' => 'Spike',
            'caracteristicas' => 'Branco, pequeno porte, macho, 2 anos',
            'especie_id' => '2',
            'foto' => 'fotos/spike.png'
            ]);
            DB::table('animais')->insert([
            'nome' => 'Abel',
            'caracteristicas' => 'Papagaio, macho, 4 anos',
            'especie_id' => '3',
            'foto' => 'fotos/abel.png'
            ]);
            DB::table('animais')->insert([
            'nome' => 'Alvin',
            'caracteristicas' => 'Hammster, fêmea, 6 meses',
            'especie_id' => '4', 
            'foto' => 'fotos/alvin.png'
            ]);
    }
}
