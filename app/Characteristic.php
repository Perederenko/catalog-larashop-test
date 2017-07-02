<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'characteristics';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The products that belong to the characteristic.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_characteristic', 'characteristic_id', 'product_id')
            ->withPivot('value');
    }
}
