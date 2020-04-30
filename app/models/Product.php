<?php

namespace App\models;

// use App\Scopes\SellerproductScope;

use App\School;
use App\Seller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    public $with = ['skus', 'categories', 'brands', 'subcategories'];
    // public function sales()
    // {
    //     return $this->belongsToMany(Sale::class);
    //     // return $this->belongsToMany('App\models\Sale')->using('App\models\ProductSale');
    // }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    // public function variant_values()
    // {
    //     return $this->hasMany(VariantValue::class);
    // }
    public function skus()
    {
        return $this->hasOne(Sku::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }


    protected static function boot()
    {
        parent::boot();
        // static::addGlobalScope(new SellerproductScope);
    }
}
