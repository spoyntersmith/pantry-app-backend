<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'name','expiryDate','bestBeforeDate','quantity','weight','list_item_id','category_id'
    ];

    /**
     * Get the List that owns the Item
     */
    public function itemList()
    {
        return $this->belongsTo('App\ItemList');
    }

    /**
     * Get the category for this item
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
