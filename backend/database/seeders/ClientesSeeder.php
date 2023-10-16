<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            ['empresa'=>'1', 'recnum'=> '1', 'tipo' => 'PJ', 'cpf_cnpj' => '13253153000192', 'razao_social' => 'CONCESSIONÁRIA CREDENCIADA BMW BRASIL  LTDA'],
            ['empresa'=>'2', 'recnum'=> '2', 'tipo' => 'PJ', 'cpf_cnpj' => '34359527000129', 'razao_social' => 'DISTRIBUIDORA DE PEÇAS E ACESSÓRIOS FIAT BRASIL LTDA.'],
            ['empresa'=>'3', 'recnum'=> '3', 'tipo' => 'PJ', 'cpf_cnpj' => '48522531000170', 'razao_social' => 'REVENDEDORA E DISTRIBUIDORA FORD MOTOR BRASIL LTDA.'],
            ['empresa'=>'4', 'recnum'=> '4', 'tipo' => 'PJ', 'cpf_cnpj' => '41815799000151', 'razao_social' => 'CONCESSIONÁRIA GM DO BRASIL LTDA'],
            ['empresa'=>'5', 'recnum'=> '5', 'tipo' => 'PJ', 'cpf_cnpj' => '39077995000124', 'razao_social' => 'REPRESENTANTE AUTOMOVEIS HONDA LTDA.'],
            ['empresa'=>'6', 'recnum'=> '6', 'tipo' => 'PJ', 'cpf_cnpj' => '41222202000165', 'razao_social' => 'CONCESSIONÁRIA AUTORIZADA HYUNDAI AUTOMOVEIS LTDA'],
            ['empresa'=>'7', 'recnum'=> '7', 'tipo' => 'PJ', 'cpf_cnpj' => '39273498000100', 'razao_social' => 'DISTRIBUIDORA DE PEÇAS PEUGEOT CITROEN LTDA'],
            ['empresa'=>'8', 'recnum'=> '8', 'tipo' => 'PJ', 'cpf_cnpj' => '29051107000140', 'razao_social' => 'REPRESENTANTE OFICIAL SCANIA LATIN AMERICA LTDA.'],
            ['empresa'=>'9', 'recnum'=> '9', 'tipo' => 'PJ', 'cpf_cnpj' => '69835390000116', 'razao_social' => 'PEÇAS E ACESSÓRIOS VOLKSWAGEN DO BRASIL LTDA'],
        ]);


    }
}
