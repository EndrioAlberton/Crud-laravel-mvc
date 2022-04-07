<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; 
use Illuminate\Support\Facades\DB;

class EspeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especies')->insert([ 'nome' => 'Gato' ]);
        DB::table('especies')->insert([ 'nome' => 'Cachorro' ]);
        DB::table('especies')->insert([ 'nome' => 'Passarinho' ]);  
        DB::table('especies')->insert([ 'nome' => 'Roedor' ]);
    }
}
