<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "comment_id",
        "user_id"
    ];
    
    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }
    
    // リレーション
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
