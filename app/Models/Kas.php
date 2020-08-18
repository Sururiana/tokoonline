<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    protected $table = 'details_transactions';
    protected $guarded = ['id'];
}
