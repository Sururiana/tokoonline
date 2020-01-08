<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagesProduct extends Model
{
    protected $table = 'Images_product';
    protected $guarded = ['id'];

    public function productRelation(){
        $this->hasMany('App\Models\Product','id',"product_id");
    }
}
