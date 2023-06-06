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
        Schema::create('carts', function (Blueprint $table) {
            $table -> id('cartID');
            $table -> unsignedBigInteger('productID');
            $table -> unsignedBigInteger('userID');
            $table -> timestamps();

            $table -> foreign('productID') -> references('productID') -> on('products');
            $table -> foreign('userID') -> references('id') -> on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
