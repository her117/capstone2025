<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    protected $fillable = ['customer_id','user_id'];

    public function products(): HasMany
    {
        return $this->hasMany(product::class);
    }

    // public function item_tranasksi(): HasMany{
    //     return $this -> hasMany(item_tranasksi::class);
    // }
}
