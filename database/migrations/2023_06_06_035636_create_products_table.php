<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table -> id('productID');
            $table -> string('name');
            $table -> string('description');
            $table -> unsignedInteger('price');
            $table -> integer('stock') -> default(0);
            $table -> integer('quantity') -> default(0);
            $table -> enum('type', ['book', 'stationary']);
            $table -> string('image');
            $table -> timestamps();
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
};
