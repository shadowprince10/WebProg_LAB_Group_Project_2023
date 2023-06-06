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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transactionID');
            $table -> unsignedBigInteger('userID');
            $table -> unsignedBigInteger('productID');
            $table -> integer('quantity');
            $table -> decimal('total', 10, 2);
            $table -> timestamps();

            $table -> foreign('userID') -> references('id') -> on('users') -> onDelete('cascade');
            $table -> foreign('productID') -> references('productID') -> on('products') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
