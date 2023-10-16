<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            ['empresa'=>'1', 'recnum'=> '1', 'sigla' => 'BMW', 'razao_social' => 'BMW DO BRASIL LTDA'],
            ['empresa'=>'2', 'recnum'=> '2', 'sigla' => 'FIAT', 'razao_social' => 'FCA FIAT CHRYSLER AUTOMOVEIS BRASIL LTDA.'],
            ['empresa'=>'3', 'recnum'=> '3', 'sigla' => 'FORD', 'razao_social' => 'FORD MOTOR COMPANY BRASIL LTDA.'],
            ['empresa'=>'4', 'recnum'=> '4', 'sigla' => 'GM', 'razao_social' => 'GENERAL MOTORS DO BRASIL LTDA'],
            ['empresa'=>'5', 'recnum'=> '5', 'sigla' => 'HONDA', 'razao_social' => 'HONDA AUTOMOVEIS DO BRASIL LTDA.'],
            ['empresa'=>'6', 'recnum'=> '6', 'sigla' => 'HYUNDAI', 'razao_social' => 'HYUNDAI MOTOR BRASIL MONTADORA DE AUTOMOVEIS LTDA'],
            ['empresa'=>'7', 'recnum'=> '7', 'sigla' => 'PEUGEOT', 'razao_social' => 'PEUGEOT CITROEN DO BRASIL AUTOMOVEIS LTDA'],
            ['empresa'=>'8', 'recnum'=> '8', 'sigla' => 'SCANIA', 'razao_social' => 'SCANIA LATIN AMERICA LTDA.'],
            ['empresa'=>'9', 'recnum'=> '9', 'sigla' => 'VW', 'razao_social' => 'VOLKSWAGEN DO BRASIL INDUSTRIA DE VEICULOS AUTOMOTORES LTDA'],
        ]);
    }
}
