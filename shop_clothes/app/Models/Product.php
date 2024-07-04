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
        'user_id',
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

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function category() {
        return $this->hasOne(category::class,'id','category_id');
    }

    public function brand() {
        return $this->hasOne(Brand::class,'id','brand_id');
    }
}
