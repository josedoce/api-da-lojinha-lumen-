<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('email');
            $table->string('senha');
            $table->string('isCliente')->default('false');
            $table->string('isVendedor')->default('false');
            $table->string('agencia')->nullable(true);
            $table->string('conta')->nullable(true);
            $table->string('cpf_cnpj')->nullable(true);
            $table->string('n_cartao')->nullable(true);
            $table->string('titular')->nullable(true);
            $table->string('validade')->nullable(true);
            $table->string('endereco')->nullable(true);
            $table->string('celular')->nullable(true);
            $table->string('token');
            $table->timestamps();
        });


        // Schema::create('numero', function(Blueprint $table){
        //     $table->id('uuid');
        //     $table->unsignedBigInteger('id_usuario');
        //     $table->string('numero');
        //     $table->timestamps();
        //     $table->foreign('id_usuario')
        //           ->references('uuid')
        //           ->on('usuario')
        //           ->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
        //Schema::dropIfExists('numero');
    }
}
