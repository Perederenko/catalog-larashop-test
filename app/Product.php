<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'products';

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
