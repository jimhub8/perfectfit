<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $with = ['subcategories'];
    public function products()
    {
        return $this->hasOne(Product::class);
    }
    public function discounts()
    {
        return $this->hasMany(Category_discount::class, 'product_category_id');
    }
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    public function sales()
    {
        return $this->belongsToMany(Sale::class);
        // return $this->belongsToMany('App\models\Sale')->using('App\models\ProductSale');
    }
}
