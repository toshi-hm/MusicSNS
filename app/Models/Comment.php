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
        return $this -> orderBy("updated_at", "DESC") -> paginate($limit_count);
    }
    protected $fillable = [
    "music_id",
    'title',
    'body',
];
}
