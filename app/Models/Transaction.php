<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    //nama tabel

    protected $guarded = ['id'];
    //guarded adalah kolom yg tidak boleh di isi
}
