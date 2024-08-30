<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    //protected $fillable = [ 'user_id', 'title', 'subtitle', 'image', 'category', 'content' ];
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user()
    { return $this->belongsTo(User::class);
    }
    public function blogComment()
    {
        return $this->hasMany(BlogComment::class, 'blog_id', 'id');
    }
}
