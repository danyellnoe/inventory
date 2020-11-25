<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the Products for the Category.
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    /**
     * Get the Comments for the Category.
     */
    public function comments()
    {
        return $this->hasManyThrough('App\Models\Comment', 'App\Models\Product');
    }


}
