<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * Get the List that owns the Item
     */
    public function list()
    {
        return $this->belongsTo('App\List', 'foreign_key');
    }
}
