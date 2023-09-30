<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_user extends Model
{
    use HasFactory;
}

public function post()   
{
    return $this->belongsTo(Post::class);  
}
public function user()   
{
    return $this->belongsTo(user::class);  
}