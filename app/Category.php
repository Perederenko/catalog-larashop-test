<?php

namespace App;

use Baum\Node;

class Category extends Node
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }


}
