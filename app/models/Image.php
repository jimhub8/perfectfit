<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'display', 'product_id', 'image',
    ];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
