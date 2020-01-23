<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id'); //id
            $table->string('transaction_code',12); //code transaksi ex. TR0001
            $table->string('resi_code',50)->nullable();
            $table->bigInteger('user_id');
            $table->string('kurir')->nullable();
            $table->text('destination')->nullable();
            $table->decimal('ongkir',15,2)->nullable();
            $table->enum('status_transaction',['waiting', 'pending', 'process', 'send'])->default('waiting');
            //type data enum adalah enumurasi, type data yg hanya di isi oleh yg sudah di definisikan
            $table->date('date_transaction')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('proof_of_payment')->nullable();
            $table->decimal('grandtotal');
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
        Schema::dropIfExists('transactions');
    }
}
