<?php

namespace App\models;

use App\School;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $with = ['categories'];
    public function schools()
    {
        return $this->belongsToMany(School::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

}
