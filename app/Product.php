<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * get $active == 1 for database
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    /**
     *  get $name == name for database
     * @param $query
     * @param $name
     * @return mixed
     */
    public function scopeName($query, $name)
    {
        return $query->where($name,'name');
    }

    /**
     * get $name == name for database
     * @param $query
     * @param $slug
     * @return mixed
     */
    public function scopeSlug($query, $slug) {
        return $query->where('slug',$slug);
    }
    
    
}
