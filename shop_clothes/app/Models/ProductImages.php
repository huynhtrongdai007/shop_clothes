<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $fillable = [
       'product_id',
       'path'
    ];
    protected $table = 'product_images';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function product() {
        return $this->belongsTo(Product::class,'id','product_id');
    }
}
