<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List extends Model 
{
    /**
     * Get the List's User
     */
    public function user()
    {
        return $this->hasOne('App\User', 'foreign_key');
    }

    /**
     * Get the items in the List
     */
    public function items() 
    {
        return $this->hasMany('App\Item');
    }
}
