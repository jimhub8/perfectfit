<?php

namespace App\models;

use App\Seller;
use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    protected $table = 'product_sale';
    
    public function seller()
    {
        return $this->hasOne(Seller::class);
    }
}
