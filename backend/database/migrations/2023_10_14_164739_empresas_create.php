<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->decimal('empresa', 4, 0);
            $table->string('sigla', 40);
            $table->string('razao_social', 255);
            $table->timestamps();

        });
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
