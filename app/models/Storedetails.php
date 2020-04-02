<?php

namespace App\models;

use App\Seller;
use Illuminate\Database\Eloquent\Model;

class Storedetails extends Model
{
    public function seller()
    {
        return $this->hasOne(Seller::class);
    }
}
