<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    public function getByLimit(int $limit_count = 10)
    {
        return $this -> orderBy("updated_at", "DESC") -> limit($limit_count) -> get();
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this::with("category") -> orderBy("updated_at", "DESC") -> paginate($limit_count);
    }
    protected $fillable = [
    "user_id",
    "music_id",
    'title',
    'body',
    "good",
    "category_id"
    ];
    
    public function category()
    {
        return $this -> belongsTo(Category::class);
    }
}
