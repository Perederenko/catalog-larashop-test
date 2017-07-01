<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * The characteristics that belong to the product.
     */
    public function characteristics()
    {
        return $this->belongsToMany('App\Characteristic')
            ->withPivot('product_characteristic', 'value');
    }
}
