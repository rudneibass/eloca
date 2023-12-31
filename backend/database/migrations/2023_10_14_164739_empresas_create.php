<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EmpresasCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id('codigo');
            
            $table->bigInteger('recnum')->unique();
            $table->bigInteger('empresa');
            $table->string('sigla', 40);
            $table->string('razao_social', 255);
            $table->timestamps();

        });

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
