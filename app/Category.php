<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get items in the category
     */
    public function items()
    {
        return $this->hasMany('App\Item', 'foreign_key');
    }
}
