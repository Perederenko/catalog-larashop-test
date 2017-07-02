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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'photo',
        'price',
        'link',
    ];

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
        return $this->belongsToMany('App\Characteristic', 'product_characteristic', 'product_id', 'characteristic_id')
            ->withPivot('value');
    }

    public static function boot ()
    {
        parent::boot();

        self::saving(function($model){
            $model->link = '/product/' . $model->slug;
        });
    }

    /**
     * Adds characteristics to this product
     *
     * @param $characteristics
     */
    public function addCharacteristics($characteristics)
    {
        $this->characteristics()->sync($characteristics);
    }
}
