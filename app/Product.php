<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeName($query, $name)
    {
        return $query->where($name,'name');
    }

    public function scopeSlug($query,$slug) {
        return $query->where($slug,'slug');
    }
    
    
}
