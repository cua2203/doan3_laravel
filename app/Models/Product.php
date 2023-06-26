<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = ['id','product_name','price','description','brand_id','category_id'
    ,'created_at','ram','storage','image_url','battery','cpu','created_at'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getProductsWithCategoryAndBrand()
    {
        return $this->with('category', 'brand')->get();
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    /*public function getProductsJoinCategories()
    {
        return $this->join('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.*', 'categories.name as category_name')
                    ->get();
    }*/
}
