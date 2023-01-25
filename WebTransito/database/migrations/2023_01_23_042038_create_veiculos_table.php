<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {

            $table->id();

            $table->string('placa')->unique();
            $table->string('chassi')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->string('cor');
            $table->string('especie');
            $table->string('pais');
            $table->string('estado');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('proprietario');

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
        Schema::dropIfExists('veiculos');
    }
}
