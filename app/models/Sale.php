<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;
    public $with = ['products'];
     /**
     * The users that belong to the role.
     */
    public function products()
    {
        return $this->belongsToMany('App\models\Product')->withPivot('quantity', 'price', 'sku_no', 'total_price');
        // return $this->belongsToMany('App\models\Product')->using('App\models\ProductSale');
    }

    public function client()
    {
        return $this->belongsTo('App\models\Client');
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function drawer()
    {
        return $this->belongsTo('App\models\Drawer');
    }

}
