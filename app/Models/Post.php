<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user()   
    {
        return $this->belongsTo(User::class);  
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function likes()
    {
        return $this->belongsToMany(User::class);
    }
    protected $fillable = [
        'category_id',
        'body',
        'image',
        'user_id',
    ];
    function getPaginateByLimit(int $limit_count = 5)
    {
    return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
