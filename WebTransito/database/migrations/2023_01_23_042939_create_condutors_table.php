<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condutors', function (Blueprint $table) {
            $table->id();

            $table->string('nome')->unique();
            $table->string('cpf')->unique();
            $table->string('rg')->unique();
            $table->string('numero_cnh')->unique();
            $table->string('categoria');
            $table->string('validade');
            $table->string('uf_cnh');
            $table->string('pais');
            $table->string('estado');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('logradouro');
            $table->string('numero');

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
        Schema::dropIfExists('condutors');
    }
}
