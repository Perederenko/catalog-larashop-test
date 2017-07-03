<?php

namespace App;

use Baum\Node;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Category extends Node
{
    use Sluggable;
    use SluggableScopeHelpers;

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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'link',
    ];

    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * @return mixed
     */
    public function countProductsByCategory()
    {
        return $this->products->count();
    }

    public static function boot ()
    {
        parent::boot();

        self::saving(function($model){
            $model->link = '/category/' . $model->slug;
        });
    }


}
