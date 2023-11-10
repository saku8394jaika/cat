<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
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
        return $this->belongsToMany(User::class,'likes');
    }
    protected $fillable = [
        'category_id',
        'body',
        'image',
        'user_id',
        'complete'
    ];
    function getPaginateByLimit(int $limit_count = 5)
    {
    return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
     public function isLikedBy($user)
    {
        return Like::where('user_id', $user->id)->where('post_id', $this->id)->first() !== null;
    }
    
    public function likeCount()
    {
        return Like::where('post_id', $this->id)->count();
    }
}
