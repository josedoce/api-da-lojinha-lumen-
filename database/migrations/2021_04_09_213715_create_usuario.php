<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('role')->default('user');
            $table->string('noToken')->nullable();
            $table->timestamp('last_logged_in')->nullable();
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
        Schema::dropIfExists('usuario');
        //Schema::dropIfExists('numero');
    }
}
