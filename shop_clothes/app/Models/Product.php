<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;


    protected $fillable = [

        'brand_id',
        'category_id',
        'name',
        'description',
        'content',
        'price',
        'qty',
        'discount',
        'weight',
        'sku',
        'featured',
        'tag',

        ];

    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

//    public function category() {
//        return $this->hasOne(Category::class,'id','category_id');
//    }

//    public function brand() {
//        return $this->hasOne(Brand::class,'id','brand_id');
//    }
    public function brand() {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }


    public function productCategory() {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function productImages() {
        return $this -> hasMany(ProductImages::class,'product_id','id');
    }
    public function productDetails() {
        return $this -> hasMany(ProductDetail::class,'product_id','id');
    }
    public function productComments() {
        return $this -> hasMany(ProductComment::class,'product_id','id');
    }
    public function orderDetails() {
        return $this -> hasMany(OrderDetail::class,'product_id','id');
    }
}
