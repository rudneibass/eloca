<?php

namespace Database\Seeders;

use App\Models\Empresa;
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
        $empresa = Empresa::max('codigo');
     
        DB::table('clientes')->insert([
            ['empresa'=> $empresa, 'recnum'=> '1', 'tipo' => 'PJ', 'cpf_cnpj' => '13253153000192', 'razao_social' => 'CONCESSIONÁRIA CREDENCIADA BMW BRASIL  LTDA'],
            ['empresa'=> $empresa, 'recnum'=> '2', 'tipo' => 'PJ', 'cpf_cnpj' => '34359527000129', 'razao_social' => 'DISTRIBUIDORA DE PEÇAS E ACESSÓRIOS FIAT BRASIL LTDA.'],
            ['empresa'=> $empresa, 'recnum'=> '3', 'tipo' => 'PJ', 'cpf_cnpj' => '48522531000170', 'razao_social' => 'REVENDEDORA E DISTRIBUIDORA FORD MOTOR BRASIL LTDA.'],
            ['empresa'=> $empresa, 'recnum'=> '4', 'tipo' => 'PJ', 'cpf_cnpj' => '41815799000151', 'razao_social' => 'CONCESSIONÁRIA GM DO BRASIL LTDA'],
            ['empresa'=> $empresa, 'recnum'=> '5', 'tipo' => 'PJ', 'cpf_cnpj' => '39077995000124', 'razao_social' => 'REPRESENTANTE AUTOMOVEIS HONDA LTDA.'],
            ['empresa'=> $empresa, 'recnum'=> '6', 'tipo' => 'PJ', 'cpf_cnpj' => '41222202000165', 'razao_social' => 'CONCESSIONÁRIA AUTORIZADA HYUNDAI AUTOMOVEIS LTDA'],
            ['empresa'=> $empresa, 'recnum'=> '7', 'tipo' => 'PJ', 'cpf_cnpj' => '39273498000100', 'razao_social' => 'DISTRIBUIDORA DE PEÇAS PEUGEOT CITROEN LTDA'],
            ['empresa'=> $empresa, 'recnum'=> '8', 'tipo' => 'PJ', 'cpf_cnpj' => '29051107000140', 'razao_social' => 'REPRESENTANTE OFICIAL SCANIA LATIN AMERICA LTDA.'],
            ['empresa'=> $empresa, 'recnum'=> '9', 'tipo' => 'PJ', 'cpf_cnpj' => '69835390000116', 'razao_social' => 'PEÇAS E ACESSÓRIOS VOLKSWAGEN DO BRASIL LTDA'],
        ]);


    }
}
