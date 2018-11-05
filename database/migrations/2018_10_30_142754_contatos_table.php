<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /**
         * Migration table de contatos
         * Campos Name, email, telefone e cep do tipo string
         * e um timestamps para guardar o momento que foi criado
         * pode definir um tamanho maximo para cada campo
         * por exemplo CEP tem 8 digitos -> $table->string('cep', 8);
         */
        Schema::create('contatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('telefone');
            $table->string('cep');
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
        /**
         * Se existir uma table com nome contatos ele apaga
         * precisa tratamentos para salvar dados
        */
        Schema::dropIfExists('contatos');
    }
}
