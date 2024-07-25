<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
    ];
    use hasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user() {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function products() {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
