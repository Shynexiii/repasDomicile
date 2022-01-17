<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('reference')->unique()->nullable();
            $table->bigInteger('categorie_id')->unsigned()->nullable();
            $table->bigInteger('sub_categorie_id')->unsigned()->nullable();
            $table->float('buy_price')->nullable();
            $table->float('sell_price')->nullable();
            $table->string('image')->nullable();
            $table->boolean('availability')->default(1);
            $table->timestamps();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_categorie_id')->references('id')->on('sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
