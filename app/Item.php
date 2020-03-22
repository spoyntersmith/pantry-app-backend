<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * Get the List that owns the Item
     */
    public function itemList()
    {
        return $this->belongsTo('App\ItemList', 'foreign_key');
    }

    /**
     * Get the category for this item
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'foreign_key');
    }
}
