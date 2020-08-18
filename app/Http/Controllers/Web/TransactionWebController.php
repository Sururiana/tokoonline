<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailsTransaction;
use App\Models\Notification;
use App\Models\Transaction;
use Illuminate\Support\Facades\Redirect;

class TransactionWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::with(['userRelation','detailRelation'])->paginate(20);
        // dd($transactions);
        return view('admin.transaction.index')->with(['transactions' => $transactions]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = DetailsTransaction::with('productRelation')->where('transaction_id',$id)->get();
        // dd($transaction);

        return view('admin.transaction.detail')->with(['transaction' => $transaction]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateProcess($id)
    {
        // return $id;
        $tra = Transaction::where('id', $id)
            ->where('status_transaction','pending')
            ->first();

        if ($tra == null) {
            return redirect()->back();
        }

        $description = "Pembayaran Transaksi $tra->transaction_code sudah di terima oleh penjual";

        Notification::insert([
            'user_id' => $tra->user_id,
            'transaction_id' => $tra->id,
            'transaction_code' => $tra->transaction_code,
            'description' => $description,
        ]);

        $tra->update([
            'status_transaction' => 'process',
        ]);

        return redirect()->back()->with([
            'status'=> [
                'code' => 200,
                'description' => 'Success'
            ]
        ]);
    }
}
