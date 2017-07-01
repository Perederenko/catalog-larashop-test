<?php

namespace App;

use Baum\Node;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Node
{
    use Sluggable;

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }


}
