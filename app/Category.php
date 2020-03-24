<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get items in the category
     */
    public function items()
    {
        return $this->hasMany('App\Item', 'foreign_key');
    }
}
