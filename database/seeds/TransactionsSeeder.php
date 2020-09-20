<?php

use App\Models\DetailsTransaction;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = array(
            array(
                'user_id' => '1',
                'transaction_code' => 'TR00001',
                'resi_code' => NULL,
                'ongkir' => '50000.00',
                'phone' => '081081208122',
                'destination' => 'surabaya',
                'grandtotal' => '100000',
                'date_transaction' => Carbon::now(),
                'status_transaction' => 'waiting',
                // 'proof_of_payment' => 'transaction/c7psDj2cA2doWBUgYwjSvoruc0jNCGeqeLDPimxh.jpeg',
                'down_payment' => null,
                'proof_of_payment' => null,
                'created_at' => Carbon::now()
            ),
            array(
                'user_id' => '1',
                'transaction_code' => 'TR00002',
                'resi_code' => NULL,
                'ongkir' => '50000.00',
                'phone' => '081081208123',
                'destination' => 'surabaya',
                'grandtotal' => '190000.00',
                'date_transaction' => Carbon::now(),
                'status_transaction' => 'waiting',
                // 'proof_of_payment'=> 'transaction/jAPBZVEgVQaUvppcsVGVQ2r2ixqLNV6etECCpLlJ.png',
                'down_payment' => null,
                'proof_of_payment' => null,
                'created_at' => Carbon::now()
            ),
        );

        $detail_transactions = array(
            array(
                'transaction_id' => '1',
                'product_id' => '1',
                'product' => 'produk contoh 1',
                'qty' => '2',
                'price' => '90000.00',
                'total' => '100000',
                'created_at' => Carbon::now()),
            array(
                'transaction_id' => '2',
                'product_id' => '2',
                'product' => 'produk contoh 2',
                'qty' => '2',
                'price' => '90000.00',
                'total' => '180000.00',
                'created_at' => Carbon::now()),
            array(
                'transaction_id' => '2',
                'product_id' => '1',
                'product' => 'produk contoh 3',
                'qty' => '1',
                'price' => '300000.00',
                'total' => '100000',
                'created_at' => Carbon::now())
        );

        Transaction::insert($transactions);
        DetailsTransaction::insert($detail_transactions);
    }
}
