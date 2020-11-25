<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'location',
    ];

    /**
     * Get the Products for the Store.
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    /**
     * Get the Categories for the Store.
     */
    public function categories()
    {
        return $this->hasManyThrough('App\Models\Category', 'App\Models\Product');
    }

    /**
     * Get the Comments for the Store.
     */
    public function comments()
    {
        return $this->hasManyThrough('App\Models\Comment', 'App\Models\Product');
    }

}
