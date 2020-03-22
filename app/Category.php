<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get items in the category
     */
    $this->public function items()
    {
        return $this->hasMany('App\Items', 'foreign_key');
    }
}
