<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    use SearchableTrait;

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
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'name' => 10,
            'description' => 10,
        ],
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

    /**
     * Gets more products in the same category, takes 4
     *
     * @param $query
     * @param $product
     * @return mixed
     */
    public function scopeMoreProducts($query, $product){
        return $query->where('category_id', $product->category->id)->where('id', '!=', $product->id)->take(4);
    }

    /**
     * Gets popular products, takes 4
     *
     * @param $query
     * @return mixed
     */
    public function scopePopularProducts($query){
        return $query->orderBy('view_number', 'desc')->take(4);
    }

    /**
     * Get url for logo.
     *
     * @return string
     */
    public function getImage(){
        if($this->photo){
            return '/uploaded/products/' . $this->photo;
        }
        return false;
    }
}
