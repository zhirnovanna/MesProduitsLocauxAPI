<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'region_id',
        'category_id',
    ];

    public function scopeSearch($query)
    {
        if(!empty(request()->search)) {
            $searchCriteria = explode(' ', request()->search);
            foreach($searchCriteria as $search) {
                $query = $query->where('products.name', 'like', '%'.$search.'%');
            }
        }
        return $query;
    }

    public function scopeRegion($query)
    {
        return empty(request()->region) ? $query : $query->where('products.region_id', request()->region);
    }
    
    public function scopeCategory($query)
    {
        return empty(request()->category) ? $query : $query->where('products.category_id', request()->category);
    }

    public function scopeMaxPrice($query)
    {
        return empty(request()->max_price) ? $query : $query->where('products.price', '<=' , request()->max_price);
    }

    public function scopeMinPrice($query)
    {
        return empty(request()->min_price) ? $query : $query->where('products.price', '>=' , request()->min_price);
    }

}
