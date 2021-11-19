<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRanking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranking', function (Blueprint $table) {
            $table->id('id');
            //$table->unsignedBigInteger('product_id');
            $table->boolean('promotions_day')->default(0);
            $table->integer('most_sold')->default(0);
            $table->decimal('best_sellers')->default(0.0);
            $table->decimal('appraised')->default(0.0);
            $table->timestamps();
            $table->foreignId('product_id')
                ->references('id')
                ->on('product')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ranking');
    }
}
