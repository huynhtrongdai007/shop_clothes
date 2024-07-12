<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'user_id',
    ];
    use HasFactory;

    protected $table = 'brands';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user() {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function products() {
        return $this->hasMany(Product::class,'brand_id','id');
    }
}
