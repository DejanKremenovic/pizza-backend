<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Append to json array
     * 
     */
    protected $appends = ['imageUrl'];

    /**
     * Generate image url
     * @return string
     */
    public function getImageUrlAttribute()
    {
        /**
         *  Uncomment this if you plan to use local storage
         *  return asset("storage/$this->image"); 
         */
        return $this->image;
    }
}
