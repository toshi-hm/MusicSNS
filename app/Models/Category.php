<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    public function comments()
    {
        return  $this -> hasMany(Comment::class);
    }
    
    public function getCategory(int $limit_count = 5)
    {
        return $this -> comments() -> with("category") ->orderBy("updated_at", "DESC") -> paginate($limit_count);
    }
}
