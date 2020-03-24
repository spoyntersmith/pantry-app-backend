<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'userId',
    ];

    /**
     * Get the List's User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the items in the List
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
