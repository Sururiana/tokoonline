<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsTransaction extends Model
{
    protected $table = 'details_transactions';
    //nama tabel

    protected $guarded = ['id'];
    //guarded adalah kolom yg tidak boleh di isi

    // public function productRelation()
    // {
    //     return $this->hashOne('product_id','_id');
    // }

    public function productRelation(){
        return $this->hasOne(\App\Models\Product::class,'id','product_id');
    }
}
