<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    protected $table = 'transactions';
    //nama tabel

    protected $guarded = ['id'];
    //guarded adalah kolom yg tidak boleh di isi

    public function scopeGetCode($query)
    {
        //TR00001
        $string = "TR";
        //0
        $selectLastCode = DB::raw(" coalesce( MAX( CAST( RIGHT( transaction_code, 5) AS UNSIGNED )) ,0) as code");

        $getData = $query->select($selectLastCode)->where('transaction_code','LIKE','%'. $string .'%')->first();
        $number = sprintf("%'.05d ", $getData->code + 1);

        //00001

        return $string.$number;
    }
}
