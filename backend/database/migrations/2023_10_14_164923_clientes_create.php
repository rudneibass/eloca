<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientesCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('codigo');

            $table->bigInteger('recnum')->unique();
            $table->string('razao_social', 255);
            $table->enum('tipo', ['PJ', 'PF']);
            $table->string('cpf_cnpj', 14);
            $table->timestamps();

            $table->unsignedBigInteger('empresa');
            
            $table->foreign('empresa')->references('codigo')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
