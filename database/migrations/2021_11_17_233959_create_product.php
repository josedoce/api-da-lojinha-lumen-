<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->nullable(false);
            $table->text('description')->nullable(false);
            $table->decimal('value')->default(0.0);
            $table->boolean('available')->default(false);
            $table->string('payment_method')->nullable(false);
            $table->integer('sold_quantity')->default(0);
            $table->string('image')->nullable(false);
            $table->timestamps();
            $table->foreignId('category_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('ranking_id')
                ->references('id')
                ->on('ranking')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product');
    }
}
