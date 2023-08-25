<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'ordem' => 31,
                'nome' => 'Brasil',
                'sigla2' => 'BR',
                'sigla3' => 'BRA',
                'codigo' => '076',
            ],
            [
                'ordem' => 189,
                'nome' => 'Portugal',
                'sigla2' => 'PT',
                'sigla3' => 'PRT',
                'codigo' => '620',
            ],
            [
                'ordem' => 65,
                'nome' => 'Espanha',
                'sigla2' => 'ES',
                'sigla3' => 'ESP',
                'codigo' => '724',
            ],
        ];

        foreach ($data as $country) {
            DB::table('countries')->insert([
                'order' => $country['ordem'],
                'name' => $country['nome'],
                'iso' => $country['sigla2'],
                'iso2' => $country['sigla3'],
                'code' => $country['codigo'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
