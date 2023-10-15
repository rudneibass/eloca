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
            ['empresa'=>'1', 'recnum'=> '1', 'sigla' => 'FIATI', 'razao_social' => 'FCA FIAT CHRYSLER AUTOMOVEIS BRASIL LTDA.'],
            ['empresa'=>'2', 'recnum'=> '2', 'sigla' => 'FORD', 'razao_social' => 'FORD MOTOR COMPANY BRASIL LTDA.'],
            ['empresa'=>'3', 'recnum'=> '3', 'sigla' => 'BMW', 'razao_social' => 'BMW DO BRASIL LTDA'],
            ['empresa'=>'4', 'recnum'=> '4', 'sigla' => 'SCANIA', 'razao_social' => 'SCANIA LATIN AMERICA LTDA.'],
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
