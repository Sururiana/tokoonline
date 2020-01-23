<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsTransaction extends Model
{
    protected $table = 'details_transactions';
    //nama tabel

    protected $guarded = ['id'];
    //guarded adalah kolom yg tidak boleh di isi
}
