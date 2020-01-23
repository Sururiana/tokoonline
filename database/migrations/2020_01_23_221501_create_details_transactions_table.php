<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //hanya menyimpan list productnya
    public function up()
    {
        Schema::create('details_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('transaction_id'); //relasi dari detail transaksi
            $table->bigInteger('product_id'); //relasi dari produk
            $table->string('product',100); //nama product
            $table->decimal('price',15,2); //harga
            $table->integer('qty'); //kuantiti
            $table->decimal('total',15,2); //total dari harga x kuantiti
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
        Schema::dropIfExists('details_transactions');
    }
}
